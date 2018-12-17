<template>
  <UserLayout class="bg-grey-lightest">
    <!-- Title -->
    <h1
      slot="page-title"
      class="text-center my-4 md:my-8"
    >
      Your Profile
    </h1>

    <!-- Form Heading -->
    <div class="flex items-center justify-between border-b pb-4 mb-4">
      <h6 class="font-medium">
        Personal Details & Contact Information
      </h6>
      <h6 class="font-medium">
        76% Complete
      </h6>
    </div>

    <!-- Form -->
    <form
      class="flex-1 flex flex-col justify-between"
      @submit.prevent="updateProfile"
    >
      <div class="cols">
        <!-- First Name -->
        <div class="col half">
          <BaseInput
            v-model="profile.first_name"
            v-validate="'required'"
            name="first_name"
            placeholder="First Name"
            :error="error.first_name ? error.first_name[0] : null"
          />
        </div>

        <!-- Last Name -->
        <div class="col half">
          <BaseInput
            v-model="profile.last_name"
            v-validate="'required'"
            name="last_name"
            placeholder="Last Name"
            :error="error.last_name ? error.last_name[0] : null"
          />
        </div>

        <!-- Email -->
        <div class="col half">
          <BaseInput
            v-model="profile.email"
            v-validate="'required'"
            name="email"
            placeholder="Email Address"
            :error="error.email ? error.email[0] : null"
          />
        </div>

        <div class="col half">
          <BaseDatePicker v-model="profile.dob" :value="profile.dob" :placeholder="'Date of Birth'" :error="error.dob ? error.dob[0] : null"/>
        </div>

        <!-- Address 1 -->
        <div class="col half">
          <BaseInput
            v-model="profile.address.address_1"
            v-validate="'required'"
            name="address_1"
            placeholder="Address Line 1"
            :error="error.address_1 ? error.address_1[0] : null"
          />
        </div>

        <!-- Address 2 -->
        <div class="col half">
          <BaseInput
            v-model="profile.address.address_2"
            v-validate="'required'"
            name="address_2"
            placeholder="Address Line 2"
            :error="error.address_2 ? error.address_2[0] : null"
          />
        </div>

        <!-- City -->
        <div class="col half">
          <BaseInput
            v-model="profile.address.city"
            v-validate="'required'"
            name="city"
            placeholder="Town / City"
            :error="error.city ? error.city[0] : null"
          />
        </div>

        <!-- State / Country -->
        <div class="col half">
          <BaseInput
            v-model="profile.address.state"
            v-validate="'required'"
            name="state"
            placeholder="State / County"
            :error="error.state ? error.state[0] : null"
          />
        </div>

        <!-- Country -->
        <div class="col half">
          <BaseSelect v-if="countries" v-model="profile.address.country" :value="profile.address.country" :options="countries" :placeholder="'Country'" :index="'value'"/>
        </div>

        <!-- Zip code / Postcode -->
        <div class="col half">
          <BaseInput
            v-model="profile.address.zip_code"
            v-validate="'required'"
            name="postcode"
            placeholder="Zip Code / Postcode"
            :error="error.zip_code ? error.zip_code[0] : null"
          />
        </div>
      </div>

      <!-- Register Button -->
      <div class="flex justify-center lg:justify-end">
        <BaseButton
          class="min-width shadow"
          :disabled="load"
          type="submit"
        >
          <BaseIcon
            v-if="load"
            name="spinner"
            spin
          />
          <span v-else>
            SAVE
          </span>
        </BaseButton>
      </div>
    </form>
  </UserLayout>
</template>

<script>
import axios from 'axios'
import UserLayout from '@layouts/User'
import { mapGetters, mapActions } from 'vuex'
import { pick, mapValues, head, map } from 'lodash'
import { success } from '@utils/toast'

export default {
  page () {
    return {
      title: this.user.name,
      meta: [
        {
          name: 'description',
          content: `The user profile for ${this.user.name}.`
        },
      ],
    }
  },

  components: { UserLayout },

  data () {
    return {
      profile: {
        first_name: '',
        last_name: '',
        email: '',
        dob: '',
        address: {
          address_1: '',
          address_2: '',
          state: '',
          city: '',
          zip_code: '',
          country: ''
        }
      },
      validationErrors: {},
      error: {},
      load: false,
      countries: null
    }
  },

  computed: {
    ...mapGetters({
      user: 'auth/user',
      address: 'auth/address'
    })
  },

  async mounted () {
    await this.setUserAddress()
    this.initData()

    const { data: { data } } = await axios.get('countries')

    this.countries = map(data, (country) => {
      return { label: country.name, value: country.alpha_2 }
    })
  },

  methods: {
    ...mapActions({
      updateUser: 'profile/updateUser',
      setUserAddress: 'auth/setUserAddress',
      updateCurrentUser: 'auth/updateCurrentUser'
    }),

    initData () {
      this.profile = Object.assign(this.profile, pick(this.user, [
        'id',
        'first_name',
        'last_name',
        'email',
        'dob'
      ]))

      this.profile.address = Object.assign(this.profile.address, this.address)
    },

    async updateProfile () {
      this.load = true
      console.log(this.profile)
      try {
        const { data } = await axios.patch(`users/${this.user.id}`, this.profile)

        this.updateCurrentUser(data.data)

        success({ text: 'User successfully updated!' })
      } catch (e) {
        this.error = e.response.data.errors
      }

      this.load = false
    }
  }
}
</script>
