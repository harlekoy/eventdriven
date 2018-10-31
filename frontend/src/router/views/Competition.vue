<template>
  <Layout>
    <div class="container mx-auto my-10">
      <!-- Tabs -->
      <tabs :tabs="[
        { label: 'TO WIN', route: 'competition' },
        { label: 'PROPOSITION BETS', route: 'home' }
      ]"/>
      <!-- Tabs End -->
    </div>
  </Layout>
</template>

<script>
import appConfig from '@src/app.config'
import Layout from '@layouts/Main'
import Tabs from '@components/FrontTabs'

export default {
  page: {
    title: 'Competition',
    meta: [{ name: 'description', content: appConfig.description }],
  },

  components: {
    Layout,
    Tabs
  }
}
</script>
