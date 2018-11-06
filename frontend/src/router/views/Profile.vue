<template>
  <UserLayout class="bg-grey-lightest">
    <h1
      slot="page-title"
      class="text-center my-8"
    >
      Your Profile
    </h1>
    <div class="flex items-center justify-between border-b pb-4 mb-4">
      <h2 class="font-light text-lg">
        Personal Details & Contact Information
      </h2>
      <span>76% Complete</span>
    </div>
    <form @submit.prevent="updateProfile">
      <div class="flex flex-col lg:flex-row lg:flex-wrap -mx-4">
        <!-- First name -->
        <BaseInput
          v-model="profile.first_name"
          v-validate="'required'"
          class="w-full lg:w-1/2 px-4 my-1"
          :target-class="{ 'w-full': true }"
          name="first_name"
          placeholder="First name"
          :error="validationErrors.first_name"
        />

        <!-- Last name -->
        <BaseInput
          v-model="profile.last_name"
          v-validate="'required'"
          class="w-full lg:w-1/2 px-4 my-1"
          :target-class="{ 'w-full': true }"
          name="last_name"
          placeholder="Last name"
          :error="validationErrors.last_name"
        />

        <!-- Email -->
        <BaseInput
          v-model="profile.username"
          v-validate="'required'"
          class="w-full lg:w-1/2 px-4 my-1"
          :target-class="{ 'w-full': true }"
          name="username"
          placeholder="Username"
          :error="validationErrors.username"
        />

        <!-- Email Address -->
        <BaseInput
          v-model="profile.email"
          v-validate="'required'"
          class="w-full lg:w-1/2 px-4 my-1"
          :target-class="{ 'w-full': true }"
          name="email"
          placeholder="Email Address"
          :error="validationErrors.email"
        />

        <!-- Address Line 1 -->
        <BaseInput
          v-model="address.address_1"
          v-validate="'required'"
          class="w-full lg:w-1/2 px-4 my-1"
          :target-class="{ 'w-full': true }"
          name="address_1"
          placeholder="Address Line 1"
          :error="validationErrors.address_1"
        />

        <!-- Address Line 2 -->
        <BaseInput
          v-model="address.address_2"
          v-validate="'required'"
          class="w-full lg:w-1/2 px-4 my-1"
          :target-class="{ 'w-full': true }"
          name="address_2"
          placeholder="Address Line 2"
          :error="validationErrors.address_2"
        />

        <!-- Town / City -->
        <BaseInput
          v-model="address.city"
          v-validate="'required'"
          class="w-full lg:w-1/2 px-4 my-1"
          :target-class="{ 'w-full': true }"
          name="city"
          placeholder="Town / City"
          :error="validationErrors.city"
        />

        <!-- State / County -->
        <BaseInput
          v-model="address.state"
          v-validate="'required'"
          class="w-full lg:w-1/2 px-4 my-1"
          :target-class="{ 'w-full': true }"
          name="state"
          placeholder="State / County"
          :error="validationErrors.state"
        />

        <!-- Country -->
        <BaseInput
          v-model="address.country"
          v-validate="'required'"
          class="w-full lg:w-1/2 px-4 my-1"
          :target-class="{ 'w-full': true }"
          name="country"
          placeholder="Country"
          :error="validationErrors.country"
        />

        <!-- Zip code / Postcode -->
        <BaseInput
          v-model="address.zip_code"
          v-validate="'required'"
          class="w-full lg:w-1/2 px-4 my-1"
          :target-class="{ 'w-full': true }"
          name="postcode"
          placeholder="Zip Code / Postcode"
          :error="validationErrors.zip_code"
        />
      </div>
      <div class="flex justify-center lg:justify-end">
        <BaseButton
          class="rounded py-4 w-48 my-2 bg-gradient"
          type="submit"
        >
          <BaseIcon
            v-if="load"
            name="spinner"
            spin
          />
          <span
            v-else
            class="uppercase font-bold"
          >
            Save
          </span>
        </BaseButton>
      </div>
    </form>
  </UserLayout>
</template>

<script>
import UserLayout from '@layouts/User'
import { mapGetters, mapActions } from 'vuex'
import { pick, mapValues, head } from 'lodash'
import { success } from '@utils/toast'

export default {
  page() {
    return {
      title: this.user.name,
      meta: [
        {
          name: 'description',
          content: `The user profile for ${this.user.name}.`,
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
      },
      address: {
        address_1: '',
        address_2: '',
        state: '',
        city: '',
        zip_code: '',
        country: '',
      },
      validationErrors: {},
      load: false,
    }
  },

  computed: {
    ...mapGetters({
      user: 'auth/user',
    })
  },

  mounted () {
    this.initData()
  },

  methods: {
    ...mapActions({
      updateUser: 'profile/updateUser',
      updateCurrentUser: 'auth/updateCurrentUser'
    }),

    initData() {
      this.profile = Object.assign(this.profile, pick(this.user, [
        'id',
        'first_name',
        'last_name',
        'username',
        'email',
      ]))

      this.address = Object.assign(this.address, this.user.address)
    },

    async updateProfile () {
      this.load = true

      try {
        const { data: { data }} = await this.updateUser({
          ...this.profile,
          address: this.address,
        })

        await this.updateCurrentUser(data)

        success({
          text: 'Account successfully updated.',
          width: 400,
        })
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

<style scoped>
/deep/ input {
  @apply bg-grey-lightest p-4 rounded my-2 border border-grey-lightest
}

/deep/ .border-red {
  @apply border-red
}
</style>
