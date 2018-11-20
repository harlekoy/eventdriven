<template>
  <section v-if="players.length">
    <h3 class="text-center mt-12 mb-10">
      Players
    </h3>
    <Carousel
      class="carousel"
      :pagination-enabled="false"
      :navigation-enabled="true"
      :per-page="4"
      :per-page-custom="[[0, 1], [768, 2], [992, 3], [1200, 4]]"
    >

      <Slide
        v-for="(item, index) in players"
        :key="index"
        class="carousel-inner">
        <Card :info="item" :page="'player'"/>
      </Slide>
    </Carousel>
  </section>
</template>

<script>
import Card from '@components/Card'
import {mapGetters, mapActions} from 'vuex'
import { Carousel, Slide } from 'vue-carousel'

export default {
  components: {
    Card,
    Carousel,
    Slide
  },

  mounted() {
    this.fetchPlayers()
  },

  computed: {
    ...mapGetters({
      players: 'players/getPlayers'
    }),
  },
  

  methods: {
    ...mapActions({
      fetchPlayers: 'players/fetchPlayers'
    })
  },

  data() {
    return {}
  }
}
</script>

