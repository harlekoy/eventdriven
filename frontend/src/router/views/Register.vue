<template>
  <Layout class="bg-green-linear">
    <div class="container mx-auto text-center my-4 md:my-8">
      <h1 class="font-sans font-thin text-5xl text-green-darker">
        Sign up
      </h1>
    </div>
    <form
      class="w-9/10 sm:w-2/3 md:w-1/2 lg:w-1/3 mx-auto flex flex-col p-10 bg-white rounded-xl shadow-md mb-12"
      @submit.prevent="register"
    >
      <BaseInput
        v-model="form.username"
        placeholder="Username"
        :error="validationErrors.username"
      />

      <BaseInput
        v-model="form.first_name"
        placeholder="First Name"
        :error="validationErrors.first_name"
      />

      <BaseInput
        v-model="form.last_name"
        placeholder="Last Name"
        :error="validationErrors.last_name"
      />

      <BaseInput
        v-model="form.email"
        type="email"
        placeholder="Email"
        :error="validationErrors.email"
      />

      <PlaceInput
        v-model="form.address.address_1"
        type="text"
        :error="validationErrors.address_1"
        placeholder="Address, Country, Postcode"
        @change="onComplete"
      />

      <BaseInput
        v-show="form.address.address_2"
        v-model="form.address.address_2"
        type="text"
        placeholder="Country"
        :error="validationErrors.address_2"
      />

      <BaseInput
        v-show="form.address.country"
        v-model="form.address.country"
        type="text"
        placeholder="Country"
        :error="validationErrors.country"
      />

      <BaseInput
        v-show="form.address.city"
        v-model="form.address.city"
        type="text"
        placeholder="City"
        :error="validationErrors.city"
      />

      <BaseInput
        v-show="form.address.postcode"
        v-model="form.address.postcode"
        type="text"
        placeholder="Postcode"
        :error="validationErrors.postcode"
      />

      <PhoneMasked
        type="text"
        :placeholder="'Phone number'"
        :pattern="['+## (##) ####-####']"
        v-model="form.phone"
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

      <p
        v-if="authError"
        class="py-4 text-red text-sm text-center"
      >
        {{ authError }}
      </p>

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
import PlaceInput from 'vue-places'
import { geoip } from '@utils/geoip'
import { head, mapValues } from 'lodash'
import { mapActions } from 'vuex'
import { success } from '@utils/toast'
import PhoneMasked from '@components/Phone';

export default {
  page: {
    title: 'Register',
    meta: [{ name: 'description', content: 'Register' }],
  },

  components: { Layout, PlaceInput, PhoneMasked },

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
    console.log(await geoip())
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

<style scoped>
/deep/ input {
  @apply bg-grey-lighter rounded my-3 p-4 w-full
}

.ap-input {
  height: 50px;
  @apply border-none;
}

.ap-icon-clear {
  width: 12px;
  height: 12px;
  top: 30px;
  cursor: pointer;
}
</style>
