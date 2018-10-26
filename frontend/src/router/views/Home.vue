<template>
  <Layout>
    <Banner :img="require('@assets/images/home-banner.png')">
      <h1 class="mb-12 text-3xl lg:text-5xl">
        Gambling just got Smarter.
      </h1>
      <h6>Prophet is the only marketplace designed for users to buy and sell previously placed sports bets. Maximized odds for buyers. Guaranteed profit for sellers.</h6>
      <button class="btn btn-plain">
        START SELLING
      </button>
    </Banner>
    <div class="container mx-auto my-12">
      <h3 class="text-center mb-10">
        Events
      </h3>
      <Carousel />
      <h3 class="text-center mt-12 mb-10">
        Teams
      </h3>
      <Carousel />
      <h3 class="text-center mt-12 mb-10">
        Players
      </h3>
      <Carousel />
    </div>
  </Layout>
</template>

<script>
import appConfig from '@src/app.config'
import Layout from '@layouts/Main'
import Banner from '@components/Banner'
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
    Carousel
  },

  async mounted () {
    await this.fetchTeams()
  },

  methods: {
    ...mapActions({
      fetchTeams: 'league/fetchTeams',
    })
  }
}
</script>
