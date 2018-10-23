<template>
  <Layout class="bg-green-linea">
    <div class="container mx-auto text-center my-4 md:my-8">
      <h1 class="font-sans font-thin text-5xl text-green-darker">Change Password</h1>
    </div>
    <form
      @submit.prevent="change"
      class="w-9/10 sm:w-2/3 md:w-1/2 lg:w-1/3 mx-auto flex flex-col p-10 bg-white rounded-xl shadow-md mb-12">

      <BaseAlert v-if="message">
        {{ this.message }}
      </BaseAlert>

      <p class="mb-5">Confirm new Password</p>

      <input
        v-model="password"
        class="bg-grey-lighter rounded my-2 mb-5 p-4 outline-none"
        type="password"
        placeholder="Enter new Password">

      <input
        v-model="password_confirm"
        class="bg-grey-lighter rounded my-2 mb-5 p-4 outline-none"
        type="password"
        placeholder="Re-enter new Password">

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
          Change Password
        </span>
      </BaseButton>
    </form>
  </Layout>
</template>

<script>
import Layout from '@layouts/Main'

export default {
  page: {
    title: 'ConfirmPassword',
    meta: [{ name: 'description', content: 'ConfirmPassword' }],
  },

  components: { Layout },

  data () {
    return {
      password: '',
      password_confirm: '',
      load: false,
      message: ''
    }
  },

  methods: {
    change() {

    }
  }
}
</script>

