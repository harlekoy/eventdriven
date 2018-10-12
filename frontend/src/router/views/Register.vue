<template>
  <Layout>
    <input v-model="form.username" type="text" placeholder="Username">
    <input v-model="form.name" type="text" placeholder="Name">
    <input v-model="form.email" type="email" placeholder="Email">
    <input v-model="form.password" type="password" placeholder="Password">

    <button @click.prevent="register">Register</button>
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

