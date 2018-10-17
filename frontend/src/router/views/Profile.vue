<template>
  <Layout class="bg-grey-lightest">
    <h1 class="text-center my-8">Your Profile</h1>
    <div class="container mx-auto">
      <div class="flex">
        <div class="w-1/4 pr-8 flex justify-end">
          <div class="flex flex-col w-48">
            <div class="bg-grey w-32 h-32 rounded-full">
            </div>
            <a class="text-black my-8 font-bold" href="#">Upload New Picture</a>

            <ul class="list-reset">
              <li class="py-4 border-b">
                <a class="text-black font-bold" href="#">Dashboard</a>
              </li>
              <li class="py-4 border-b">
                <a class="text-black font-bold" href="#">Contact Information</a>
              </li>
              <li class="py-4 border-b">
                <a class="text-black font-bold" href="#">Password</a>
              </li>
              <li class="py-4 border-b">
                <a class="text-black font-bold" href="#">Deposit Funds</a>
              </li>
              <li class="py-4 border-b">
                <a class="text-black font-bold" href="#">Withdraw Funds</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="bg-white h-full flex-1 rounded-lg text-grey-darkest p-4 shadow-lg">
          <div class="flex items-center justify-between border-b pb-4">
            <h2 class="font-light text-xl">Personal Details & Contact Information</h2>
            <span>76% Complete</span>
          </div>
          <div class="flex flex-wrap">
            <!-- First name -->
            <BaseInput
              class="w-1/2"
              :target-class="{ 'w-full': true }"
              v-model="profile.first_name"
              v-validate="'required'"
              name="first_name"
              placeholder="First name"
            />

            <!-- Last name -->
            <BaseInput
              class="w-1/2"
              :target-class="{ 'w-full': true }"
              v-model="profile.last_name"
              v-validate="'required'"
              name="last_name"
              placeholder="Last name"
            />

            <!-- Email Address -->
            <BaseInput
              class="w-1/2"
              :target-class="{ 'w-full': true }"
              v-model="profile.email"
              v-validate="'required'"
              name="email"
              placeholder="Email Address"
            />

            <!-- Address Line 1 -->
            <BaseInput
              class="w-1/2"
              :target-class="{ 'w-full': true }"
              v-model="profile.address_1"
              v-validate="'required'"
              name="address_1"
              placeholder="Address Line 1"
            />

            <!-- Address Line 2 -->
            <BaseInput
              class="w-1/2"
              :target-class="{ 'w-full': true }"
              v-model="profile.address_2"
              v-validate="'required'"
              name="address_2"
              placeholder="Address Line 2"
            />

            <!-- Town / City -->
            <BaseInput
              class="w-1/2"
              :target-class="{ 'w-full': true }"
              v-model="profile.city"
              v-validate="'required'"
              name="city"
              placeholder="Town / City"
            />

            <!-- State / County -->
            <BaseInput
              class="w-1/2"
              :target-class="{ 'w-full': true }"
              v-model="profile.state"
              v-validate="'required'"
              name="state"
              placeholder="State / County"
            />

            <!-- Country -->
            <BaseInput
              class="w-1/2"
              :target-class="{ 'w-full': true }"
              v-model="profile.country"
              v-validate="'required'"
              name="country"
              placeholder="Country"
            />

            <!-- Zip code / Postcode -->
            <BaseInput
              class="w-1/2"
              :target-class="{ 'w-full': true }"
              v-model="profile.postcode"
              v-validate="'required'"
              name="postcode"
              placeholder="Zip Code / Postcode"
            />

            <BaseButton
              class="rounded p-4 my-2"
              type="submit"
            >
              <BaseIcon
                v-if="load"
                name="sync"
                spin
              />
              <span class="uppercase" v-else>
                Save
              </span>
            </BaseButton>
          </div>
        </div>
      </div>
    </div>
    <!-- <h1>
      <BaseIcon name="user" />
      {{ user.name }}
      Profile
    </h1> -->
    <!-- <pre>{{ user }}</pre> -->
  </Layout>
</template>

<script>
import Layout from '@layouts/Main'
import { mapGetters } from 'vuex'

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

  data () {
    return {
      profile: {
        first_name: ''
      },
      load: false,
    }
  },

  components: { Layout },

  computed: {
    ...mapGetters({
        user: 'auth/user',
    })
  }
}
</script>

<style scoped>
/deep/ input {
  @apply bg-grey-lighter p-4 rounded my-2 border border-grey-lighter
}
</style>
