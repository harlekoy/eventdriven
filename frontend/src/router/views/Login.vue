<template>
  <Layout>
    <form
      class="w-1/3 mx-auto flex flex-col"
      @submit.prevent="tryToLogIn"
    >
      <BaseInput
        class="bg-grey-lighter p-4 rounded my-2"
        v-model="username"
        name="username"
        placeholder="Email"
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
