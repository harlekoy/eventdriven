<template>
<Layout>
  <div>
    <h4 v-if="authenticated">
        You are logged in!
    </h4>
    <h4 v-if="!authenticated">
      You are not logged in! Please <a @click="auth.login()">Log In</a> to continue.
    </h4>
  </div>
</Layout>
</template>

<script>
import appConfig from '@src/app.config'
import Layout from '@layouts/main'

export default {
  props: ['auth', 'authenticated'],
  page: {
    title: 'Home',
    meta: [{ name: 'description', content: appConfig.description }],
  },
  components: { Layout },
}
</script>
