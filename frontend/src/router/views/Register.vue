<template>
  <Layout>
    <div class="container mx-auto text-center my-4 md:my-8">
      <h1 class="font-sans font-thin text-5xl text-green-darker">Sign up</h1>      
    </div>
    <form 
      class="w-3/4 sm:w-2/3 md:w-1/2 lg:w-1/3 mx-auto flex flex-col p-10 bg-white rounded-xl shadow-md">
      <input class="bg-grey-lighter rounded my-2 mb-4 p-4"
        v-model="form.username" type="text" placeholder="Username">
      <input class="bg-grey-lighter rounded my-2 mb-4 p-4"
        v-model="form.name" type="text" placeholder="Name">
      <input class="bg-grey-lighter rounded my-2 mb-4 p-4"
        v-model="form.email" type="email" placeholder="Email">
      <input class="bg-grey-lighter rounded my-2 mb-6 p-4"
        v-model="form.password" type="password" placeholder="Password">

      <button class="p-4 rounded text-white bg-brand-green" @click.prevent="register">
        Register
      </button>
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

