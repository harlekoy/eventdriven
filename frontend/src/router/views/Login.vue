<template>
  <Layout>
    <form
      :class="$style.form"
      @submit.prevent="tryToLogIn"
    >
      <BaseInput
        v-model="username"
        name="username"
      />
      <BaseInput
        v-model="password"
        name="password"
        type="password"
      />
      <BaseButton
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
  },
}
</script>

<style lang="scss" module>
@import '@design';

.form {
  text-align: center;
}
</style>
