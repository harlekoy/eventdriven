<template>
  <Layout class="bg-grey-lightest">
    <h1 class="text-center my-8">
      Your Profile
    </h1>
    <div class="container mx-auto mb-12">
      <div class="flex">
        <div class="w-1/4 pr-8 flex justify-end">
          <div class="flex flex-col w-48">
            <div class="bg-grey w-32 h-32 rounded-full" />
            <a
              class="text-black my-8 font-bold hover:text-green-dark"
              href="#"
            >
              Upload New Picture
            </a>

            <ul class="list-reset">
              <li class="py-4 border-b">
                <router-link
                  class="text-black font-bold hover:text-green-dark"
                  :to="{ name: 'dashboard' }"
                >
                  Dashboard
                </router-link>
              </li>
              <li class="py-4 border-b">
                <a
                  class="text-black font-bold hover:text-green-dark"
                  href="#"
                >
                  Contact Information
                </a>
              </li>
              <li class="py-4 border-b">
                <a
                  class="text-black font-bold hover:text-green-dark"
                  href="#"
                >
                  Password
                </a>
              </li>
              <li class="py-4 border-b">
                <a
                  class="text-black font-bold hover:text-green-dark"
                  href="#"
                >
                  Deposit Funds
                </a>
              </li>
              <li class="py-4 border-b">
                <a
                  class="text-black font-bold hover:text-green-dark"
                  href="#"
                >
                  Withdraw Funds
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="bg-white h-full flex-1 rounded-lg text-grey-darkest p-4 shadow-lg">
          <div class="flex items-center justify-between border-b pb-4 mb-4">
            <h2 class="font-light text-lg">
              Personal Details & Contact Information
            </h2>
            <span>76% Complete</span>
          </div>
          <div class="flex flex-wrap -mx-4">
            <!-- First name -->
            <BaseInput
              v-model="profile.first_name"
              v-validate="'required'"
              class="w-1/2 px-4 my-1"
              :target-class="{ 'w-full': true }"
              name="first_name"
              placeholder="First name"
            />

            <!-- Last name -->
            <BaseInput
              v-model="profile.last_name"
              v-validate="'required'"
              class="w-1/2 px-4 my-1"
              :target-class="{ 'w-full': true }"
              name="last_name"
              placeholder="Last name"
            />

            <!-- Email Address -->
            <BaseInput
              v-model="profile.email"
              v-validate="'required'"
              class="w-1/2 px-4 my-1"
              :target-class="{ 'w-full': true }"
              name="email"
              placeholder="Email Address"
            />

            <!-- Address Line 1 -->
            <BaseInput
              v-model="profile.address_1"
              v-validate="'required'"
              class="w-1/2 px-4 my-1"
              :target-class="{ 'w-full': true }"
              name="address_1"
              placeholder="Address Line 1"
            />

            <!-- Address Line 2 -->
            <BaseInput
              v-model="profile.address_2"
              v-validate="'required'"
              class="w-1/2 px-4 my-1"
              :target-class="{ 'w-full': true }"
              name="address_2"
              placeholder="Address Line 2"
            />

            <!-- Town / City -->
            <BaseInput
              v-model="profile.city"
              v-validate="'required'"
              class="w-1/2 px-4 my-1"
              :target-class="{ 'w-full': true }"
              name="city"
              placeholder="Town / City"
            />

            <!-- State / County -->
            <BaseInput
              v-model="profile.state"
              v-validate="'required'"
              class="w-1/2 px-4 my-1"
              :target-class="{ 'w-full': true }"
              name="state"
              placeholder="State / County"
            />

            <!-- Country -->
            <BaseInput
              v-model="profile.country"
              v-validate="'required'"
              class="w-1/2 px-4 my-1"
              :target-class="{ 'w-full': true }"
              name="country"
              placeholder="Country"
            />

            <!-- Zip code / Postcode -->
            <BaseInput
              v-model="profile.postcode"
              v-validate="'required'"
              class="w-1/2 px-4 my-1"
              :target-class="{ 'w-full': true }"
              name="postcode"
              placeholder="Zip Code / Postcode"
            />
          </div>
          <div class="flex justify-end">
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

  components: { Layout },

  data () {
    return {
      profile: {
        first_name: '',
        last_name: '',
        email: '',
        address_1: '',
        address_2: '',
        state: '',
        city: '',
        postcode: '',
        country: '',
      },
      load: false,
    }
  },

  computed: {
    ...mapGetters({
      user: 'auth/user',
    })
  }
}
</script>

<style scoped>
/deep/ input {
  @apply bg-grey-lightest p-4 rounded my-2 border border-grey-lightest
}
</style>
