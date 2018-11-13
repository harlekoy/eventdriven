<script>
export default {
  
}
</script>

<template>
  <Carousel
    class="carousel"
    :pagination-enabled="false"
    :navigation-enabled="true"
    :per-page="4"
    :per-page-custom="[[0, 1], [768, 2], [992, 3], [1200, 4]]"
  >

    <Slide 
      v-for="(item, index) in player_data"
      :key="index"
      class="carousel-inner">
      <Card :info="item" :page="'player'"/>
    </Slide>

  </Carousel>
</template>

<script>
import Card from '@components/Card'
import { Carousel, Slide } from 'vue-carousel'

export default {
  components: {
    Card,
    Carousel,
    Slide
  },

  data() {
    return {
      player_data: [
        {
          name: 'Roger Federer',
          image: '/player_rfederer.png',
          odds: '80:1',
          return: '22x',
          wagers: 97,
        },
        {
          name: 'Tiger Woods',
          image: '/player_t_woods.png',
          odds: '40:1',
          return: '12x',
          wagers: 197,
        },
        {
          name: 'Harry Kane',
          image: '/player_h_kane.png',
          odds: '40:1',
          return: '55x',
          wagers: 400,
        },
        {
          name: 'Phil Mickerson',
          image: '/player_p_mickelson.png',
          odds: '20:1',
          return: '22x',
          wagers: 197,
        },
        {
          name: 'Micheal Van Gerwen',
          image: '/player_mv_gerwen.png',
          odds: '20:1',
          return: '22x',
          wagers: 197,
        },
      ]
    }
  }
}
</script>

