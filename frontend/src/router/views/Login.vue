<template>
  <Layout class="bg-green-linear">
    <div class="container mx-auto text-center my-4 md:my-8">
      <h1>
        Login
      </h1>
    </div>
    <form
      class="w-9/10 sm:w-2/3 md:w-1/2 lg:w-2/5 xl:w-1/3 mx-auto flex flex-col p-10 bg-white rounded-xl shadow mb-12"
      @submit.prevent="tryToLogIn"
    >
      <BaseAlert>
        <p class="font-bold">
          User Test Credentials:
        </p>
        <p class="text-sm">
          <b>Username:</b> admin
        </p>
        <p class="text-sm">
          <b>Password:</b> Testing@123
        </p>
      </BaseAlert>

      <BaseInput
        v-model="username"
        v-validate="'required'"
        name="username"
        placeholder="Username"
      />

      <BasePassword
        v-model="password"
        v-validate="'required'"
        name="password"
        type="password"
        placeholder="Password"
      />

      <BaseButton
        class="rounded p-4 my-2"
        :disabled="load"
        type="submit"
      >
        <BaseIcon
          v-if="load"
          name="spinner"
          spin
        />
        <span v-else>
          Log in
        </span>
      </BaseButton>

      <p
        v-if="authError"
        class="py-4 text-red text-sm text-center"
      >
        {{ authError }}
      </p>

      <p class="flex flex-row mb-6">
        <BaseCheckbox
          v-model="remember_me"
          class="flex-1 cursor-pointer whitespace-no-wrap"
          type="checkbox"
          :checked="remember_me"
          @input="toggleValue"
        >
          Remember Me
        </BaseCheckbox>

        <router-link
          :to="{ name: 'forgot-password' }"
          class="flex-1 text-sm text-grey-darkest outline-none py-3 no-underline justify-end flex text-green-darker hover:text-blue-dark"
        >
          Forgot Password
        </router-link>
      </p>
      <a
        class="no-underline text-center text-white bg-facebook-blue rounded p-3 my-2 text-sm -ml-1"
        href="#"
        @click="loginViaSocial('facebook')"
      >
        <img
          class="float-left"
          src="@assets/images/facebook.svg"
          width="17"
          alt="Facebook"
        >
        Continue with Facebook
      </a>
      <a
        class="no-underline text-center text-white bg-google-red rounded p-3 my-2 text-sm -ml-1"
        href="#"
        @click="loginViaSocial('google-oauth2')"
      >
        <img
          class="float-left"
          src="@assets/images/google.svg"
          width="14"
          alt="Google"
        >
        Continue with Google
      </a>
      <p class="pt-4 pb-1 text-center">
        <router-link
          to="/register"
          class="text-sm text-grey-darkest outline-none hover:text-blue-dark"
        >
          Create new account
        </router-link>
      </p>
    </form>
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
  data() {
    return {
      username: '',
      password: '',
      authError: null,
      load: false,
      remember_me: false,
    }
  },

  methods: {
    ...authMethods,

    ...mapActions({
      saveToken: 'auth/saveToken',
    }),

    // Try to log the user in with the username
    // and password they provided.
    async tryToLogIn() {
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
