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
        <PlaceInput class="input" autocomplete="off" v-model="form.address_1" type="text" :error="validationErrors.address_1"placeholder="Address, Country, Postcode" @change="onComplete"/>

        <!-- Country -->
        <BaseInput v-show="toggleFields" v-model="form.country" type="text" placeholder="Country" :error="validationErrors.country"/>

        <!-- City -->
        <BaseInput v-show="toggleFields" v-model="form.city" type="text" placeholder="City" :error="validationErrors.city"/>

        <!-- Country Code -->
        <BaseInput v-show="toggleFields" v-model="form.country_code" type="text" placeholder="Country code" :error="validationErrors.country_code"/>

        <!-- Post Code -->
        <BaseInput v-show="toggleFields" v-model="form.postcode" type="text" placeholder="Postcode" :error="validationErrors.postcode"/>

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
        address_1: '',
        address_2: '',
        city: '',
        country: '',
        postcode: '',
        country_code: '',
        phone: '',
        dob: '',
      },
      load: false,
      validationErrors: {},
      authError: '',
      showOtherFields: false
    }
  },

  computed: {
    toggleFields() {
      let model = this.form.address_1
      return model != null && this.showOtherFields ? 1 : this.showOtherFields = false
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
      this.showOtherFields = true
      let {country, postcode, value, name, countryCode} = response

      let places = {
        address_1: value,
        country: country,
        city: name,
        postcode: postcode,
        country_code: countryCode
      }

      this.form = Object.assign(this.form, places)
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
