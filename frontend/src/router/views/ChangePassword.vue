<template>
  <Layout class="bg-green-linea">
    <div class="container mx-auto text-center my-4 md:my-8">
      <h1 class="font-sans font-thin text-5xl text-green-darker">
        Change Password
      </h1>
    </div>
    <form
      class="w-9/10 sm:w-2/3 md:w-1/2 lg:w-1/3 mx-auto flex flex-col p-10 bg-white rounded-xl shadow-md mb-12"
      @submit.prevent="change"
    >
      <BaseAlert v-if="message">
        {{ message }}
      </BaseAlert>

      <input
        v-model="password"
        class="bg-grey-lighter rounded my-2 mb-5 p-4 outline-none"
        type="text"
        placeholder="Current Password"
      >

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
    title: 'ChangePassword',
    meta: [{ name: 'description', content: 'ChangePassword' }],
  },

  components: { Layout },

  data () {
    return {
      password: '',
      load: false,
      message: ''
    }
  },

  methods: {
    change() {



      this.$router.push({ name: 'confirm-password' })
    }
  }
}
</script>

