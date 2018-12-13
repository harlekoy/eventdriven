<template>
  <Layout class="bg-grey-lightest">
    <!-- Title -->
    <h1
      slot="page-title"
      class="text-center my-4 md:my-8"
    >
      Change Password
    </h1>

    <!-- Form Heading -->
    <div class="flex items-center justify-between border-b pb-4 mb-4">
      <h6 class="font-medium">
        Change Password
      </h6>
    </div>

    <!-- Form -->
    <form
      class="flex-1 flex flex-col justify-between"
      @submit.prevent="submit"
    >
      <div>
        <!-- Old Password -->
        <div class="cols">
          <div class="col half">
            <BasePassword
              v-model="password.old_password"
              v-validate="'required'"
              name="password"
              type="password"
              placeholder="Old Password"
              :error="error.old_password ? error.old_password[0] : null"
            />
          </div>
        </div>

        <!-- New Password -->
        <div class="cols">
          <div class="col half">
            <BasePassword
              v-model="password.new_password"
              v-validate="'required'"
              name="password"
              type="password"
              placeholder="New Password"
              :error="error.new_password ? error.new_password[0] : null"
            />
          </div>
        </div>
      </div>

      <!-- Register Button -->
      <div class="flex justify-center lg:justify-end">
        <BaseButton
          class="min-width shadow"
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
  </Layout>
</template>

<script>
import Cookie from 'js-cookie'
import Layout from '@layouts/User'
import qs from 'qs'
import axios from 'axios'
import { mapGetters, mapActions } from 'vuex'
import { mapValues, get } from 'lodash'
import { success } from '@utils/toast'

export default {
  page: {
    title: 'Change Password',
    meta: [{ name: 'description', content: 'ChangePassword' }]
  },

  components: { Layout },

  data () {
    return {
      password: {
        old_password: '',
        new_password: ''
      },
      load: false,
      error: {}
    }
  },

  computed: {
    ...mapGetters({
      user: 'auth/user'
    }),
  },

  methods: {
    ...mapActions({
      updateUser: 'profile/updateUser',
      authorizeToChangePass: 'auth/logIn',
      canChangePass: 'auth/canChangePass'
    }),

    async submit() {
      this.load = true
      this.error = {}

      try {
        const { data } = await axios.post(`password/change`, this.password)

        success({ text: 'Password successfully changed.' })

        this.password.old_password = ''
        this.password.new_password = ''
      } catch (e) {
        if (Array.isArray(e.response.data)) {
          this.error.old_password = e.response.data
        } else {
          this.error = e.response.data.errors
        }
      }

      this.load = false
    }
  }
}
</script>
