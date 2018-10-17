<template>
  <Layout class="bg-green-linear">
    <div class="container mx-auto text-center my-4 md:my-8">
      <h1 class="font-sans font-thin text-5xl text-green-darker">Login</h1>
    </div>
    <form
      class="w-2/3 sm:w-2/3 md:w-1/2 lg:w-2/5 xl:w-1/3 mx-auto flex flex-col p-10 bg-white rounded-xl shadow mb-12"
      @submit.prevent="tryToLogIn"
    >
      <!-- Alert box -->
      <div class="bg-teal-lightest border-t-4 border-teal rounded-b text-teal-darkest px-4 py-3 my-2 mb-6" role="alert">
        <div class="flex leading-normal">
          <svg class="h-6 w-6 text-teal mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg>
          <div>
            <p class="font-bold">Admin Test Credentials:</p>
            <p class="text-sm"><b>Username:</b> admin</p>
            <p class="text-sm"><b>Password:</b> Testing@123</p>
          </div>
        </div>
      </div>
      <BaseInput
        v-model="username"
        v-validate="'required'"
        name="username"
        placeholder="Username"
      />
      <BaseInput
        v-model="password"
        v-validate="'required'"
        name="password"
        type="password"
        placeholder="Password"
      />
      <BaseButton
        class="rounded p-4 my-2"
        :disabled="tryingToLogIn"
        type="submit"
      >
        <BaseIcon
          v-if="load"
          name="sync"
          spin
        />
        <span v-else>
          Log in
        </span>
      </BaseButton>

      <p v-if="authError" class="py-4 text-grey-dark text-sm">
        There was an error logging in to your account.
      </p>

      <p class="flex flex-row mb-6">
        <BaseCheckbox
          class="flex-1 cursor-pointer"
          type="checkbox"
          @input="toggleValue"
          v-model="remember_me"
          :checked="remember_me">
          Remember Me
        </BaseCheckbox>

        <router-link
          :to="{ name: 'forgot-password' }"
          class="flex-1 text-sm text-grey-darkest outline-none py-3 no-underline justify-end flex text-green-darker hover:text-blue"
          >Forgot Password
        </router-link>
      </p>
      <a
        class="no-underline text-center text-white bg-facebook-blue rounded p-3 my-2 text-sm -ml-1"
        href="#"
        @click="loginViaSocial('facebook')"
        >
        <img
          class="float-left"
          src="@assets/images/facebook.svg" width="17" alt="Facebook">
          Continue with Facebook
      </a>
      <a
        class="no-underline text-center text-white bg-google-red rounded p-3 my-2 text-sm -ml-1"
        href="#"
        @click="loginViaSocial('google-oauth2')">
        <img
          class="float-left"
          src="@assets/images/google.svg" width="14" alt="Google">
          Continue with Google
      </a>
      <p class="pt-4 pb-1 text-center">
        <router-link
          to="/register"
          class="text-sm text-grey-darkest outline-none hover:text-blue"
          >Create new account</router-link>
      </p>
    </form>
  </Layout>
</template>

<script>
import appConfig from '@src/app.config'
import auth0 from 'auth0-js'
import Layout from '@layouts/Main'
import { authMethods } from '@state/helpers'
import { loginViaSocial } from '@utils/auth'

export default {
  page: {
    title: 'Log in',
    meta: [{ name: 'description', content: `Log in to ${appConfig.title}` }],
  },
  components: { Layout },
  data() {
    return {
      username: '',
      password: '',
      remember_me: false,
      authError: null,
      load: false,
    }
  },

  methods: {
    ...authMethods,

    // Try to log the user in with the username
    // and password they provided.
    async tryToLogIn() {
      this.load = true

      const valid = await this.$validator.validateAll()

      if (valid) {
        this.logIn({
          username: this.username,
          password: this.password,
          cb: () => {
            this.load = false
          }
        })
      } else {
        this.load = false
      }
    },

    toggleValue(state) {
      this.remember_me = state
    },

    loginViaSocial
  },
}

</script>

<style lang="scss" scoped>
/deep/ input {
  @apply bg-grey-lighter p-4 rounded my-2 w-full border border-grey-lighter
}

/deep/ input:focus {
  @apply border-blue-light
}

[aria-invalid="true"] /deep/ input {
  @apply border-red
}
</style>
