<template>
  <Layout class="bg-green-linear">
    <div class="container mx-auto text-center my-4 md:my-8">
      <h1 class="font-sans font-thin text-5xl text-green-darker">
        Sign up
      </h1>
    </div>
    <form
      @submit.prevent="register"
      class="w-9/10 sm:w-2/3 md:w-1/2 lg:w-1/3 mx-auto flex flex-col p-10 bg-white rounded-xl shadow-md mb-12"
    >

      <BaseInput
        v-model="form.username"
        placeholder="Username"
        :error="validationErrors.username"
      />

      <BaseInput
        v-model="form.name"
        placeholder="Name"
        :error="validationErrors.name"
      />

      <BaseInput
        v-model="form.email"
        type="email"
        placeholder="Email"
        :error="validationErrors.email"
      />

      <BasePassword
        v-model="form.password"
        type="password"
        placeholder="Password"
        :error="validationErrors.password"
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
          Register
        </span>
      </BaseButton>

      <p class="py-4 text-center">
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
import axios from 'axios'
import Layout from '@layouts/Main'
import { head, mapValues } from 'lodash'
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
      },
      load: false,
      validationErrors: {},
    }
  },

  mounted () {
    this.validationErrors = Object.assign({}, this.form)
  },

  methods: {
    ...mapActions({
      signup: 'auth/signUp',
    }),

    async validate () {
      try {
        await axios.post('signup/validate', this.form)
      } catch ({ response: { data: { errors }} }) {
        this.validationErrors = mapValues(errors, (errors) => {
          return head(errors)
        })

        this.load = false

        return false
      }

      return true
    },

    async register () {
      this.load = true

      const valid = await this.validate()

      if (valid) {
        this.signup({
          data: this.form,
          cb: () => {
            this.load = false
          }
        })
      }
    }
  }
}
</script>

<style scoped>
/deep/ input {
  @apply bg-grey-lighter rounded my-3 p-4 w-full
}
</style>
