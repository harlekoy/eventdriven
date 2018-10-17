<template>
  <Layout class="bg-green-linea">
    <h1>
      <BaseIcon name="user" />
      {{ user.name }}
      Profile
    </h1>
    <pre>{{ user }}</pre>
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

  computed: {
    ...mapGetters({
        user: 'auth/user',
    })
  }
}
</script>
