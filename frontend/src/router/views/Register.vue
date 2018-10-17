<template>
  <Layout class="bg-green-linear">
    <div class="container mx-auto text-center my-4 md:my-8">
      <h1 class="font-sans font-thin text-5xl text-green-darker">
        Sign up
      </h1>
    </div>
    <form
      class="w-3/4 sm:w-2/3 md:w-1/2 lg:w-1/3 mx-auto flex flex-col p-10 bg-white rounded-xl shadow-md mb-12"
    >
      <input 
        v-model="form.username"
        class="bg-grey-lighter rounded my-2 mb-4 p-4 outline-none" 
        type="text" 
        placeholder="Username"
      >
      <input 
        v-model="form.name"
        class="bg-grey-lighter rounded my-2 mb-4 p-4 outline-none" 
        type="text" 
        placeholder="Name"
      >
      <input 
        v-model="form.email"
        class="bg-grey-lighter rounded my-2 mb-4 p-4 outline-none" 
        type="email" 
        placeholder="Email"
      >
      <input 
        v-model="form.password"
        class="bg-grey-lighter rounded my-2 mb-6 p-4" 
        type="password" 
        placeholder="Password"
      >

      <button 
        class="p-4 rounded text-white bg-brand-green mb-5" 
        @click.prevent="register"
      >
        Register
      </button>
      <p class="py-4 text-center">
        <router-link
          to="/login"
          class="text-sm text-grey-darkest outline-none hover:text-blue"
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
    title: 'Register',
    meta: [{ name: 'description', content: 'Register' }],
  },

  components: { Layout },

  data () {
    return {
      form: {
        username: '',
        email: '',
        name: '',
        password: '',
      }
    }
  },

  methods: {
    ...mapActions({
      signup: 'auth/signUp',
    }),

    register () {
      this.signup(this.form)
    }
  }
}
</script>

