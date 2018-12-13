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
            placeholder="First name"
            :error="validationErrors.first_name"
          />
        </div>

        <!-- Last Name -->
        <div class="col half">
          <BaseInput
            v-model="profile.last_name"
            v-validate="'required'"
            name="last_name"
            placeholder="Last name"
            :error="validationErrors.last_name"
          />
        </div>

        <!-- Email -->
        <div class="col half">
          <BaseInput
            v-model="profile.email"
            v-validate="'required'"
            name="email"
            placeholder="Email Address"
            :error="validationErrors.email"
          />
        </div>

        <!-- Address 1 -->
        <div class="col half">
          <BaseInput
            v-model="profile.address.address_1"
            v-validate="'required'"
            name="address_1"
            placeholder="Address Line 1"
            :error="validationErrors.address_1"
          />
        </div>

        <!-- Address 2 -->
        <div class="col half">
          <BaseInput
            v-model="profile.address.address_2"
            v-validate="'required'"
            name="address_2"
            placeholder="Address Line 2"
            :error="validationErrors.address_2"
          />
        </div>

        <!-- City -->
        <div class="col half">
          <BaseInput
            v-model="profile.address.city"
            v-validate="'required'"
            name="city"
            placeholder="Town / City"
            :error="validationErrors.city"
          />
        </div>

        <!-- State / Country -->
        <div class="col half">
          <BaseInput
            v-model="profile.address.state"
            v-validate="'required'"
            name="state"
            placeholder="State / County"
            :error="validationErrors.state"
          />
        </div>

        <!-- Country -->
        <div class="col half">
          <BaseInput
            v-model="profile.address.country"
            v-validate="'required'"
            name="country"
            placeholder="Country"
            :error="validationErrors.country"
          />
        </div>

        <!-- Zip code / Postcode -->
        <div class="col half">
          <BaseInput
            v-model="profile.address.zip_code"
            v-validate="'required'"
            name="postcode"
            placeholder="Zip Code / Postcode"
            :error="validationErrors.zip_code"
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
import { pick, mapValues, head } from 'lodash'
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
        username: '',
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
      load: false
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
  },

  methods: {
    ...mapActions({
      updateUser: 'profile/updateUser',
      setUserAddress: 'auth/setUserAddress'
    }),

    initData () {
      this.profile = Object.assign(this.profile, pick(this.user, [
        'id',
        'first_name',
        'last_name',
        'username',
        'email'
      ]))

      this.profile.address = Object.assign(this.profile.address, this.address)
    },

    async updateProfile () {
      this.load = true

      try {
        const { data } = await axios.patch(`users/${this.user.id}`, this.profile)

        success({ text: 'User successfully updated!' })
      } catch (e) {
        this.error = e.response.data.errors
      }

      // try {
      //   const { data: { data }} = await this.updateUser({
      //     ...this.profile,
      //     address: this.address
      //   })

      //   await this.updateCurrentUser(data)

      //   success({
      //     text: 'Account successfully updated.',
      //     width: 400,
      //   })
      // } catch ({ response: { data: { errors }} }) {
      //   this.validationErrors = mapValues(errors, (errors) => {
      //     return head(errors)
      //   })
      // }

      this.load = false
    }
  }
}
</script>
