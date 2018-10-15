<template>
  <Layout>
    <h1>Home Page</h1>
    <img
      src="@assets/images/logo.png"
      alt="Logo"
    >
  </Layout>
</template>

<script>
import appConfig from '@src/app.config'
import Layout from '@layouts/Main'

export default {
  page: {
    title: 'Home',
    meta: [{ name: 'description', content: appConfig.description }],
  },
  components: { Layout },
}
</script>
