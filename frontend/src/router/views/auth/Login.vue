<template>
  <!-- eslint-disable -->

  <Layout class="bg-green-linear">
    <div class="container mx-auto">

      <!-- Title -->
      <h1 class="text-center my-4 md:my-8">Login</h1>

      <!-- Form -->
      <form class="white-wrapper form mb-12" @submit.prevent="tryToLogIn">

        <!-- Note -->
        <BaseAlert>
          <p class="font-bold">User Test Credentials:</p>
          <p class="text-sm"><b>Username:</b> admin</p>
          <p class="text-sm"><b>Password:</b> Testing@123</p>
        </BaseAlert>

        <!-- Username -->
        <BaseInput v-model="username" v-validate="'required'" name="username" placeholder="Username"/>

        <!-- Password -->
        <BasePassword v-model="password" v-validate="'required'" name="password" type="password" placeholder="Password"/>

        <!-- Login Button -->
        <BaseButton class="btn mb-5" :disabled="load" type="submit">
          <BaseIcon v-if="load" name="spinner" spin/>
          <span v-else>Log in</span>
        </BaseButton>

        <!-- Errors -->
        <p v-if="authError" class="invalid text-center">{{ authError }}</p>

        <!-- Checkbox -->
        <p class="flex flex-row mb-5 justify-between">
          <BaseCheckbox v-model="remember_me" class="cursor-pointer whitespace-no-wrap" type="checkbox" :checked="remember_me" @input="toggleValue">
            Remember Me
          </BaseCheckbox>

          <router-link :to="{ name: 'forgot-password' }" class="text-grey-darkest flex items-center text-green-darker hover:text-blue-dark">Forgot Password</router-link>
        </p>

        <!-- Facebook Login -->
        <a class="btn btn-fb iconed-left mb-3" @click="loginViaSocial('facebook')">
          <img class="icon" src="@assets/images/facebook.svg" width="17" alt="Facebook"/>
          Continue with Facebook
        </a>

        <!-- Google Login -->
        <a class="btn btn-danger iconed-left mb-3" @click="loginViaSocial('google-oauth2')">
          <img class="icon" src="@assets/images/google.svg" width="14" alt="Google"/>
          Continue with Google
        </a>

        <!-- Registration Link -->
        <div class="text-center mt-5">
          <router-link to="/register" class="text-grey-darkest hover:text-blue-dark">Create new account</router-link>
        </div>

      </form>

    </div>
  </Layout>
</template>

<script>
import appConfig from '@src/app.config'
import Layout from '@layouts/Main'
import { authMethods } from '@state/helpers'
import { loginViaSocial } from '@utils/auth'
import { mapActions } from 'vuex';

export default {
  page: {
    title: 'Log in',
    meta: [{ name: 'description', content: `Log in to ${appConfig.title}` }],
  },

  components: { Layout },

  data () {
    return {
      username: '',
      password: '',
      authError: null,
      load: false,
      remember_me: false
    }
  },

  methods: {
    ...authMethods,

    ...mapActions({
      saveToken: 'auth/saveToken'
    }),

    async tryToLogIn() {
      // Try to log the user in with the username and password they provided.
      this.load = true
      this.authError = null

      const valid = await this.$validator.validateAll()
      if (valid) {
        this.logIn({
          username: this.username,
          password: this.password,
          cb: ({ error_description: msg }) => {
            this.authError = msg
            this.load = false
          }
        })

        this.saveToken({ remember_me: this.remember_me })
      } else {
        this.load = false
      }
    },

    toggleValue(state) {
      this.remember_me = state
    },

    loginViaSocial
  }
}
</script>
