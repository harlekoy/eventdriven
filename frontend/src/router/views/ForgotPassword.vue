<template>
  <!-- eslint-disable -->

  <Layout class="bg-green-linear">
    <div class="container mx-auto">

      <!-- Title -->
      <h1 class="text-center my-4 md:my-8">Forgot Password</h1>

      <form class="white-wrapper form mb-12" @submit.prevent="forgot">

        <!-- Errors -->
        <BaseAlert v-if="message">{{ message }}</BaseAlert>

        <!-- Email -->
        <BaseInput v-model="email" placeholder="Email"/>

        <!-- Errors -->
        <p v-if="error" class="invalid text-center">{{ error }}</p>

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
    title: 'ForgotPassword',
    meta: [{ name: 'description', content: 'ForgotPassword' }]
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

    async forgot () {
      // Reset data.
      this.error = null
      this.load = true

      try {
        const { data } = await axios.post('password/email', {
          email: this.email
        })

        success({ text: 'Please check your email to reset password.' })
        this.email = ''
      } catch (e) {
        this.error = e.response.data.errors.email[0]
      }

      this.load = false
    }
  }
}
</script>

