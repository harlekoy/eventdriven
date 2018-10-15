<template>
  <Layout>
    <form
      class="w-1/3 mx-auto flex flex-col"
      @submit.prevent="tryToLogIn"
    >
      <!-- Alert box -->
      <div class="bg-teal-lightest border-t-4 border-teal rounded-b text-teal-darkest px-4 py-3 shadow-md my-2" role="alert">
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
        class="bg-grey-lighter p-4 rounded my-2"
        v-model="username"
        name="username"
        placeholder="Username"
      />
      <BaseInput
        class="bg-grey-lighter p-4 rounded my-2"
        v-model="password"
        name="password"
        type="password"
        placeholder="Password"
      />
      <BaseButton
        class="rounded"
        :disabled="tryingToLogIn"
        type="submit"
      >
        <BaseIcon
          v-if="tryingToLogIn"
          name="sync"
          spin
        />
        <span v-else>
          Log in
        </span>
      </BaseButton>
      <a href="#" @click="loginViaSocial('google-oauth2')">Google</a>
      <p v-if="authError">
        There was an error logging in to your account.
      </p>
    </form>
  </Layout>
</template>

<script>
import appConfig from '@src/app.config'
import auth0 from 'auth0-js'
import Layout from '@layouts/main'
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
      authError: null,
      tryingToLogIn: false,
    }
  },
  methods: {
    ...authMethods,

    // Try to log the user in with the username
    // and password they provided.
    tryToLogIn() {
      return this.logIn({
        username: this.username,
        password: this.password,
      })
    },
    loginViaSocial
  },
}
</script>
