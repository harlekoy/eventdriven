<template>
  <Layout>
    <Banner :img="require('@assets/images/home-banner.png')">
      <h1 class="mb-12">
        Gambling just got Smarter.
      </h1>
      <h6>Prophet is the only marketplace designed for users to buy and sell previously placed sports bets. Maximized odds for buyers. Guaranteed profit for sellers.</h6>
      <router-link to="sell" class="btn btn-plain">
        START SELLING
      </router-link>
    </Banner>
    <div class="container mx-auto my-12">
      <TheEvent />
      <TheTeam />
      <ThePlayer />
    </div>
  </Layout>
</template>

<script>
import appConfig from '@src/app.config'
import Layout from '@layouts/Main'
import Banner from '@components/Banner'
import ThePlayer from '@components/Home/ThePlayer'
import TheEvent from '@components/Home/TheEvent'
import TheTeam from '@components/Home/TheTeam'
import Carousel from '@components/Carousel'
import { mapActions } from 'vuex'

export default {
  page: {
    title: 'Home',
    meta: [{ name: 'description', content: appConfig.description }],
  },

  components: {
    Layout,
    Banner,
    Carousel,
    ThePlayer,
    TheEvent,
    TheTeam,
  },

  async mounted () {
    await this.fetchSports()
  },

  methods: {
    ...mapActions({
      fetchSports: 'league/fetchSports',
    })
  }
}
</script>
