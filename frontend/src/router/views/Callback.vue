<template>
  <div class="spinner">
    Loading...
  </div>
</template>

<script>
import qs from 'qs'
import { mapActions } from 'vuex'

export default {
  methods: {
    ...mapActions({
      handleAuth: 'auth/handleAuth'
    })
  },

  async mounted () {
    await this.handleAuth()

    // this.$router.push({ name: 'home' })
  }
}
</script>
