<template>
  <!-- eslint-disable -->

  <Layout class="bg-green-linear">
    <div class="container mx-auto">

      <!-- Title -->
      <h1 class="text-center my-4 md:my-8">Register</h1>

      <!-- Form -->
      <form class="white-wrapper form mb-12" @submit.prevent="register">

        <!-- Username -->
        <BaseInput v-model="form.username" placeholder="Username" :error="validationErrors.username"/>

        <!-- First Name -->
        <BaseInput v-model="form.first_name" placeholder="First Name" :error="validationErrors.first_name"/>

        <!-- Last Name -->
        <BaseInput v-model="form.last_name" placeholder="Last Name" :error="validationErrors.last_name"/>

        <!-- Email -->
        <BaseInput v-model="form.email" type="email" placeholder="Email" :error="validationErrors.email"/>

        <!-- Address 1 -->
        <PlaceInput class="input" autocomplete="off" v-model="form.address.address_1" type="text" :error="validationErrors.address_1"placeholder="Address, Country, Postcode" @change="onComplete"/>

        <!-- Address 2 -->
        <BaseInput v-show="form.address.address_2" v-model="form.address.address_2" type="text" placeholder="Country" :error="validationErrors.address_2"/>

        <!-- Country -->
        <BaseInput v-show="form.address.country" v-model="form.address.country" type="text" placeholder="Country" :error="validationErrors.country"/>

        <!-- City -->
        <BaseInput v-show="form.address.city" v-model="form.address.city" type="text" placeholder="City" :error="validationErrors.city"/>

        <!-- Post Code -->
        <BaseInput v-show="form.address.postcode" v-model="form.address.postcode" type="text" placeholder="Postcode" :error="validationErrors.postcode"/>

        <!-- Phone -->
        <PhoneMasked class="input-parent" v-model="form.phone" type="text" :placeholder="'Phone number'" :pattern="['+## (##) ####-####']"/>

        <!-- Password -->
        <BasePassword v-model="form.password" type="password" placeholder="Password" :error="validationErrors.password"/>

        <!-- Register Button -->
        <BaseButton class="btn mb-2" :disabled="load" type="submit">
          <BaseIcon v-if="load" name="spinner" spin/>
          <span v-else>Register</span>
        </BaseButton>

        <!-- Errors -->
        <p v-if="authError" class="invalid text-center">{{ authError }}</p>

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
import PlaceInput from 'vue-places'
import { geoip } from '@utils/geoip'
import { head, mapValues } from 'lodash'
import { mapActions } from 'vuex'
import { success } from '@utils/toast'
import PhoneMasked from '@components/Phone';

export default {
  page: {
    title: 'Register',
    meta: [{ name: 'description', content: 'Register' }]
  },

  components: {
    Layout,
    PlaceInput,
    PhoneMasked
  },

  data () {
    return {
      form: {
        username: '',
        email: '',
        first_name: '',
        last_name: '',
        password: '',
        address: {
          address_1: '',
          address_2: '',
          city: '',
          country: '',
          country_code: '',
        },
        phone: '',
        dob: '',
      },
      load: false,
      validationErrors: {},
      authError: '',
    }
  },

  async mounted () {
    this.validationErrors = Object.assign({}, this.form)
    await geoip()
  },

  methods: {
    ...mapActions({
      signup: 'auth/signUp',
    }),

    onComplete(response) {
      let {country, postcode, value, name, countryCode} = response

      this.form.address = {
        address_1: value,
        address_2: name,
        country: country,
        postcode: postcode,
        country_code: countryCode
      }
    },

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
          data: Object.assign(this.form, {
            name: `${this.form.first_name} ${this.form.last_name}`,
          }),
          cb: (err) => {
            this.load = false

            if (!err) {
              success({
                text: 'User account created.'
              })

              this.$router.push({ name: 'login' })
            } else {
              this.authError = err
            }
          }
        })
      }
    }
  }
}
</script>
