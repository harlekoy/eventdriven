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
              v-model="password.old" 
              v-validate="'required'" 
              name="password" 
              type="password" 
              placeholder="Old Password"
            />
            <span 
              v-if="message.old" 
              class="text-red text-xs"
            >
              {{ message.old }}
            </span>
          </div>
        </div>

        <!-- New Password -->
        <div class="cols">
          <div class="col half">
            <BasePassword 
              v-model="password.new" 
              v-validate="'required'" 
              name="password" 
              type="password" 
              placeholder="New Password"
            />
            <span 
              v-if="message.new" 
              class="text-red text-xs"
            >
              {{ message.new }}
            </span>
          </div>
        </div>
      </div>

      <!-- Register Button -->
      <div class="flex justify-center lg:justify-end">
        <BaseButton 
          class="min-width shadow" 
          :disabled="!canUpdate" 
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
        old: '',
        new: ''
      },
      load: false,
      message: {
        old: '',
        new: ''
      },
      canUpdate: false,
      validationErrors: {}
    }
  },

  watch: {
    password: {
      handler (current) {
        if (current.old && current.new) {
          this.canUpdate = true
        }

        this.clear()
      },
      deep: true
    }
  },

  computed: {
    ...mapGetters({
      user: 'auth/user'
    }),
  },

  async mounted () {
    if (this.verify()) {
      try {
        this.load = true

        await this.updateUser({
          id: this.user.id,
          password: Cookie.get('password')
        })

        success({
          text: 'Password successfully changed.',
          width: 500
        })

        Cookie.remove('password')
        this.$router.push({ name: 'change-password' })
      } catch ({ response: { data: { message } } }) {
        this.message.new = message
      }
    }
  },

  methods: {
    ...mapActions({
      updateUser: 'profile/updateUser',
      authorizeToChangePass: 'auth/logIn',
      canChangePass: 'auth/canChangePass'
    }),

    verify () {
      let params = qs.parse(this.$route.hash.substring(1))
      let token = get(params, 'access_token', '')

      return !!Cookie.get('password') && token.length === 32
    },

    cachePassword () {
      let minutes = 1.5
      let date = new Date()

      date.setTime(date.getTime() + (minutes * 60 * 1000))

      Cookie.set('password', this.password.new, { expires: date })
    },

    async submit() {
      this.load = true
      this.clear()

      this.cachePassword()

      this.authorizeToChangePass({
        username: this.user.username,
        password: this.password.old,
        redirectUri: `${location.origin}/password/change`,
        cb: () => {
          this.message.old = 'Incorrect password'
          this.load = false
        }
      })
    },

    clear () {
      this.message = {
        old: '',
        new: ''
      }
    }
  }
}
</script>
