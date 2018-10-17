<template>
  <Layout class="bg-green-linea">
    <input v-model="email" type="email" placeholder="Email">
    <button @click.prevent="forgotPassword(email)">Reset Password</button>
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

