<template>
  <Layout class="bg-green-linea">
    <div class="container mx-auto text-center my-4 md:my-8">
      <h1 class="font-sans font-thin text-5xl text-green-darker">Forgot Password</h1>
    </div>
    <form
      class="w-3/4 sm:w-2/3 md:w-1/2 lg:w-1/3 mx-auto flex flex-col p-10 bg-white rounded-xl shadow-md mb-12">
      <input
        v-model="email"
        class="bg-grey-lighter rounded my-2 mb-4 p-4 outline-none"
        type="email"
        placeholder="Email">
      <button
        class="p-4 rounded text-white bg-brand-green mb-4"
        @click.prevent="forgotPassword(email)">Reset Password</button>
      <p class="pt-4 pb-2 text-center">
        <router-link
          to="/login"
          class="text-sm text-grey-darkest outline-none hover:text-blue">
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
    }
  },

  methods: {
    ...mapActions({
      forgotPassword: 'auth/forgotPassword'
    }),
  }
}
</script>

