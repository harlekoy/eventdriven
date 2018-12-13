<template>
  <!-- eslint-disable -->

  <Layout class="bg-green-linear">
    <div class="container mx-auto">

      <!-- Title -->
      <h1 class="text-center my-4 md:my-8">Register</h1>

      <!-- Form -->
      <form class="white-wrapper form mb-12" @submit.prevent="register">

        <!-- First Name -->
        <BaseInput v-model="form.first_name" placeholder="First Name" :error="validationErrors.first_name"/>

        <!-- Last Name -->
        <BaseInput v-model="form.last_name" placeholder="Last Name" :error="validationErrors.last_name"/>

        <!-- DOB -->
        <BaseDatePicker v-model="form.dob" :placeholder="'Birth of Date'"/>

        <!-- Email -->
        <BaseInput v-model="form.email" type="email" placeholder="Email" :error="validationErrors.email"/>

        <!-- Address 1 -->
        <PlaceInput class="input" v-model="form.address.address_1" type="text" :error="validationErrors.address_1"placeholder="Address, Country, Postcode" @change="onComplete"/>

        <!-- City -->
        <BaseInput v-show="toggleFields" v-model="form.address.city" type="text" placeholder="City" :error="validationErrors.city"/>

        <!-- Country Code -->
        <BaseInput v-show="toggleFields" v-model="form.address.country" type="text" placeholder="Country code" :error="validationErrors.country"/>

        <!-- Post Code -->
        <BaseInput v-show="toggleFields" v-model="form.address.zip_code" type="text" placeholder="Postcode" :error="validationErrors.zip_code"/>

        <!-- Phone -->
        <PhoneMasked class="input-parent" v-model="form.phone" type="text" :placeholder="'Phone number'" :pattern="['+## (##) ####-####']"/>

        <!-- Password -->
        <BasePassword v-model="form.password" type="password" placeholder="Password" :error="validationErrors.password"/>

        <!-- Errors -->
        <p v-if="authError" class="invalid text-center">{{ authError }}</p>

        <!-- Register Button -->
        <BaseButton class="btn mb-2" :disabled="load" type="submit">
          <BaseIcon v-if="load" name="spinner" spin/>
          <span v-else>Register</span>
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
import PlaceInput from 'vue-places'
import { geoip } from '@utils/geoip'
import { head, mapValues } from 'lodash'
import { mapActions } from 'vuex'
import { success, fail } from '@utils/toast'
import PhoneMasked from '@components/Phone'

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
        email: '',
        first_name: '',
        last_name: '',
        password: '',
        phone: '',
        dob: '',
        address: {
          address_1: '',
          city: '',
          zip_code: '',
          country: ''
        }
      },
      load: false,
      validationErrors: {},
      authError: '',
      showOtherFields: false
    }
  },

  computed: {
    toggleFields() {
      let model = this.form.address.address_1
      return model != null && this.showOtherFields ? 1 : this.showOtherFields = false
    }
  },

  async mounted () {
    this.validationErrors = Object.assign({}, this.form)

    await geoip()
  },

  methods: {
    ...mapActions({
      signup: 'auth/signUp'
    }),

    onComplete (response) {
      this.showOtherFields = true
      let { country, postcode, value, name, countryCode } = response

      let places = {
        address_1: value,
        city: name,
        zip_code: postcode,
        country: `${countryCode}`.toUpperCase()
      }

      this.form.address = Object.assign(this.form.address, places)
    },

    async register () {
      this.load = true
      this.validationErrors = {}

      try {
        const { data } = await axios.post('register', this.form)

        success({ text: 'You have successfully registered!' })
        this.$router.push({ name: 'login' })
      } catch ({ response: { data: { errors }} }) {
        this.validationErrors = mapValues(errors, (errors) => {
          return head(errors)
        })
      }

      this.load = false
    }
  }
}
</script>
