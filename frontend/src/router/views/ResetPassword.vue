<template>
  <!-- eslint-disable -->

  <Layout class="bg-green-linear">
    <div class="container mx-auto">

      <!-- Title -->
      <h1 class="text-center my-4 md:my-8">Reset Password</h1>

      <form class="white-wrapper form mb-12" @submit.prevent="reset">

        <!-- Errors -->
        <BaseAlert v-if="message">{{ message }}</BaseAlert>

        <!-- Email -->
        <BaseInput disabled v-model="email" placeholder="Email"/>

        <!-- Password -->
        <BasePassword :error="error && error.password ? error.password[0] : null" v-model="password" placeholder="Password"/>

        <!-- Submit Button -->
        <BaseButton class="btn mb-2" :disabled="load" type="submit">
          <BaseIcon v-if="load" name="spinner" spin/>
          <span v-else>Reset Password</span>
        </BaseButton>

        <!-- Login Link -->
        <div class="text-center mt-5">
          <router-link to="/login" class="text-grey-darkest hover:text-blue-dark">Have an account? Sign In</router-link>
        </div>

      </form>
    </div>
  </Layout>
</template>

<script>
import axios from 'axios'
import Layout from '@layouts/Main'
import { fail, success } from '@utils/toast'
import { mapActions } from 'vuex'

export default {
  page: {
    title: 'ResetPassword',
    meta: [{ name: 'description', content: 'ResetPassword' }],
  },

  components: { Layout },

  mounted () {
    if (this.$route.query.email) {
      this.email = this.$route.query.email
      this.token = this.$route.query.token
    } else {
      this.$router.push({ name: 'login' })
    }
  },

  data () {
    return {
      email: '',
      password: '',
      token: '',
      load: false,
      message: null,
      error: null
    }
  },

  methods: {
    ...mapActions({
      forgotPassword: 'auth/forgotPassword'
    }),

    async reset () {
      // Reset data.
      this.error = null
      this.load = true

      try {
        const { data } = await axios.post('password/reset', {
          token: this.token,
          email: this.email,
          password: this.password,
          password_confirmation: this.password
        })

        success({ text: 'Password successfully updated!' })
        this.$router.push({ name: 'login' })
      } catch (e) {
        this.error = e.response.data.errors
      }

      this.load = false
    }
  }
}
</script>

