<template>
  <Layout class="bg-grey-lightest">
    <h1 slot="page-title" class="text-center my-8">Your Profile</h1>
    <div class="flex items-center justify-between border-b pb-4 mb-6">
      <h2 class="font-light text-lg">
        Change Password
      </h2>
    </div>
    <form @submit.prevent="submit">
      <div class="flex flex-col">
        <p class="w-1/2 my-1">
          Old Password
        </p>
        <div class="w-1/2 my-1 mb-4">
          <BasePassword
            v-model="password.old"
            v-validate="'required'"
            name="password"
            type="password"
            placeholder="Password"
          />
          <span v-if="message.old" class="text-red text-xs">{{ message.old }}</span>
        </div>
        <p class="w-1/2 my-1">
          New Password
        </p>
        <div class="w-1/2 my-1">
          <BasePassword
            v-model="password.new"
            v-validate="'required'"
            name="password"
            type="password"
            placeholder="Password"
          />
          <span v-if="message.new" class="text-red text-xs">{{ message.new }}</span>
        </div>
      </div>
      <div class="flex justify-end">
        <BaseButton
          class="rounded py-4 w-48 my-2 bg-gradient"
          type="submit"
          :disabled="!canUpdate"
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
    meta: [{ name: 'description', content: 'ChangePassword' }],
  },

  components: { Layout },

  data () {
    return {
      password: {
        old: '',
        new: '',
      },
      load: false,
      message: {
        old: '',
        new: '',
      },
      canUpdate: false,
      validationErrors: {},
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
      user: 'auth/user',
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
          width: 500,
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
      canChangePass: 'auth/canChangePass',
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
        new: '',
      }
    }
  }
}
</script>

<style scoped>
/deep/ input {
  @apply bg-grey-lightest p-4 rounded my-2 border border-grey-lightest w-full;
}

/deep/ .border-red {
  @apply border-red
}

/deep/ button:disabled {
  cursor: not-allowed;
  background: #ccc;
}
</style>
