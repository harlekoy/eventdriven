<template>
  <UserLayout class="bg-grey-lightest">
    <h1 slot="page-title" class="text-center my-8">Your Profile</h1>
    <div class="flex items-center justify-between border-b pb-4 mb-6">
      <h2 class="font-light text-lg">
        Change Password
      </h2>
    </div>
    <form @submit.prevent="submitChangePass">
      <div class="flex flex-col">
        <p class="w-1/2 my-1">
          Old Password
        </p>
        <div class="w-1/2 my-1 mb-4">
          <BasePassword
            v-model="changePassword.current"
            v-validate="'required'"
            name="password"
            type="password"
            placeholder="Password"
          />        
        </div>
        <p class="w-1/2 my-1">
          New Password
        </p>
        <div class="w-1/2 my-1">
          <BasePassword
            v-model="changePassword.new_password"
            v-validate="'required'"
            name="password"
            type="password"
            placeholder="Password"
          />        
        </div>
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
    </form>
  </UserLayout>
</template>

<script>
import UserLayout from '@layouts/User'
import { success } from '@utils/toast'

export default {
  page: {
    title: 'ChangePassword',
    meta: [{ name: 'description', content: 'ChangePassword' }],
  },

  components: { UserLayout },

  data () {
    return {
      changePassword: {
        current: '',
        new_password: '',
      },
      load: false,
      message: '',
      validationErrors: {},
    }
  },

  methods: {
    async submitChangePass() {
      this.load = true

      try {

        success({
          text: 'Password successfully changed.',
          width: 500,
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
  @apply bg-grey-lightest p-4 rounded my-2 border border-grey-lightest w-full;
}

/deep/ .border-red {
  @apply border-red
}
</style>
