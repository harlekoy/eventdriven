<template>
  <Layout>
    <banner :img="require('@assets/images/home-banner.png')">
      <h1 class="mb-12">Gambling just got Smarter.</h1>
      <h6>Prophet is the only marketplace designed for users to buy and sell previously placed sports bets. Maximized odds for buyers. Guaranteed profit for sellers.</h6>
      <button class="btn btn-plain">START SELLING</button>
    </banner>
  </Layout>
</template>

<script>
import appConfig from '@src/app.config'
import Layout from '@layouts/Main'
import Banner from '@components/Banner'

export default {
  page: {
    title: 'Home',
    meta: [{ name: 'description', content: appConfig.description }],
  },
  components: {
    Layout,
    Banner
  },
}
</script>
