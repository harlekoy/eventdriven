<template>
  <Layout class="bg-green-linea">
    <div class="container mx-auto text-center my-4 md:my-8">
      <h1>
        Forgot Password
      </h1>
    </div>
    <form
      class="w-9/10 sm:w-2/3 md:w-1/2 lg:w-1/3 mx-auto flex flex-col p-10 bg-white rounded-xl shadow-md mb-12"
      @submit.prevent="forgot"
    >
      <BaseAlert v-if="message">
        {{ message }}
      </BaseAlert>

      <input
        v-model="email"
        v-validate="'required'"
        class="bg-grey-lighter rounded my-2 mb-4 p-4 outline-none"
        type="email"
        placeholder="Email"
      >

      <p
        v-if="error"
        class="py-4 text-red text-sm text-center"
      >
        {{ error }}
      </p>

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
          Reset Password
        </span>
      </BaseButton>

      <p class="pt-4 pb-2 text-center">
        <router-link
          to="/login"
          class="text-sm text-grey-darkest outline-none hover:text-blue-dark"
        >
          Have an account? Sign In
        </router-link>
      </p>
    </form>
  </Layout>
</template>

<script>
import Layout from '@layouts/Main'
import { mapActions } from 'vuex'

export default {
  page: {
    title: 'ForgotPassword',
    meta: [{ name: 'description', content: 'ForgotPassword' }],
  },

  components: { Layout },

  data () {
    return {
      email: '',
      load: false,
      message: null,
      error: null
    }
  },

  methods: {
    ...mapActions({
      forgotPassword: 'auth/forgotPassword'
    }),

    forgot () {
      this.error = null
      this.message = null
      this.load = true

      this.forgotPassword({
        email: this.email,
        cb: (err, msg) => {
          if (err) this.error = err.description
          this.message = msg
          this.load = false
        }
      })
    }
  }
}
</script>

