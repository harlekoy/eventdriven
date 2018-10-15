<template>
  <Layout>
    <form class="flex flex-col w-1/3 mx-auto">
      <input class="bg-grey-lighter my-2 p-4"
        v-model="form.username" type="text" placeholder="Username">
      <input class="bg-grey-lighter my-2 p-4"
        v-model="form.name" type="text" placeholder="Name">
      <input class="bg-grey-lighter my-2 p-4"
        v-model="form.email" type="email" placeholder="Email">
      <input class="bg-grey-lighter my-2 p-4"
        v-model="form.password" type="password" placeholder="Password">

      <button class="p-4 rounded bg-blue text-white" @click.prevent="register">Register</button>
    </form>
  </Layout>
</template>

<script>
import Layout from '@layouts/main'
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

