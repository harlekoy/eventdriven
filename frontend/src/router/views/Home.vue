<template>
  <Layout>
    <Banner :img="require('@assets/images/home-banner.png')">
      <h1 class="mb-12">
        Gambling just got Smarter.
      </h1>
      <h6>Prophet is the only marketplace designed for users to buy and sell previously placed sports bets. Maximized odds for buyers. Guaranteed profit for sellers.</h6>
      <router-link
        to="sell"
        class="btn btn-plain"
      >
        START SELLING
      </router-link>
    </Banner>
    <div class="container mx-auto my-12">
      <div v-if="hasSportData">
        <TheEvent />
        <TheTeam />
        <ThePlayer />
      </div>
      <div 
        v-else 
        class="text-center py-8"
      >
        <img 
          src="@assets/images/icon-empty.svg" 
          class="mb-8 w-2/5 lg:w-1/5"
        >
        <p class="font-medium text-lg">
          We are sorry, There is no data available at the moment
        </p>
      </div>
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
import { mapActions, mapGetters } from 'vuex'

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

  computed: {
    ...mapGetters({
      tournaments: 'sports/tournaments',
      teams: 'sports/teams',
      players: 'players/getPlayers',
    }),

    hasSportData () {
      return this.tournaments || this.teams || this.players
    }
  },

  async mounted () {
    if (this.$route.query.token) {
      this.handleAuth(this.$route.query.token)
    }

    await this.fetchSports()
  },

  methods: {
    ...mapActions({
      fetchSports: 'league/fetchSports',
      handleAuth: 'auth/handleAuth'
    })
  }
}
</script>
