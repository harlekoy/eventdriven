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
          <p class="text-sm"><b>Email:</b> admin@admin.com</p>
          <p class="text-sm"><b>Password:</b> Testing@123</p>
        </BaseAlert>

        <!-- Username -->
        <BaseInput :error="authError && authError.email ? authError.email[0] : null" v-model="email" v-validate="'required'" name="email" placeholder="Email"/>

        <!-- Password -->
        <BasePassword :error="authError && authError.password ? authError.password[0] : null" v-model="password" v-validate="'required'" name="password" type="password" placeholder="Password"/>

        <!-- Login Button -->
        <BaseButton class="btn mb-5" :disabled="load" type="submit">
          <BaseIcon v-if="load" name="spinner" spin/>
          <span v-else>Log in</span>
        </BaseButton>

        <!-- Checkbox -->
        <p class="flex flex-row mb-5 justify-between">
          <BaseCheckbox v-model="remember_me" class="cursor-pointer whitespace-no-wrap" type="checkbox" :checked="remember_me" @input="toggleValue">
            Remember Me
          </BaseCheckbox>

          <router-link :to="{ name: 'forgot-password' }" class="forgot-password text-grey-darkest flex items-center text-green-darker hover:text-blue-dark">Forgot Password</router-link>
        </p>

        <!-- Facebook Login -->
        <a class="btn btn-fb iconed-left mb-3" @click="loginViaSocial('facebook')">
          <img class="icon" src="@assets/images/facebook.svg" width="17" alt="Facebook"/>
          Continue with Facebook
        </a>

        <!-- Google Login -->
        <a class="btn btn-danger iconed-left mb-3" :href="loginGoogle">
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
import axios from 'axios'
import appConfig from '@src/app.config'
import Layout from '@layouts/Main'
import { authMethods } from '@state/helpers'
import { loginViaSocial } from '@utils/auth'
import { mapActions } from 'vuex';
import { fail, success } from '@utils/toast'

export default {
  page: {
    title: 'Log in',
    meta: [{ name: 'description', content: `Log in to ${appConfig.title}` }],
  },

  components: { Layout },

  data () {
    return {
      email: '',
      password: '',
      authError: null,
      load: false,
      remember_me: false
    }
  },

  computed: {
    loginGoogle () {
      return process.env.VUE_APP_API_URL + '/social/redirect/google'
    }
  },

  methods: {
    ...authMethods,

    ...mapActions({
      saveToken: 'auth/saveToken',
      handleAuth: 'auth/handleAuth'
    }),

    async tryToLogIn() {
      // Try to log the user in with the email and password they provided.
      this.load = true
      this.authError = null

      try {
        const { data } = await axios.post('login', {
          email: this.email,
          password: this.password
        })

        this.handleAuth(data.token)
        this.saveToken({ remember_me: this.remember_me })
      } catch (e) {
        this.authError = e.response.data.errors
      }

      this.load = false
    },

    toggleValue(state) {
      this.remember_me = state
    },

    async validateIP() {
      const { data: { valid } } = await axios.get('validate-ip')

      
    },

    loginViaSocial
  }
}
</script>
