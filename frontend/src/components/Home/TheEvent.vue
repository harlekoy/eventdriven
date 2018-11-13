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
      v-for="(item, index) in event_data"
      :key="index"
      class="carousel-inner">
      <Card :info="item" :page="'event'"/>
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
      event_data: [
        {
          name: 'Super Bowl 2018',
          image: '/event_super_bowl.png',
          odds: '20:1',
          return: '12x',
          wagers: 2000,
        },
        {
          name: 'US Open',
          image: '/event_us_open.png',
          odds: '10:1',
          return: '9x',
          wagers: 1917,
        },
        {
          name: 'PGA Tour 2018',
          image: '/event_pga_tour.png',
          odds: '8:1',
          return: '23x',
          wagers: 1000,
        },
        {
          name: 'Winter Olympics',
          image: '/event_winter_olympics.png',
          odds: '10:1',
          return: '12x',
          wagers: 199,
        },
        {
          name: 'English Premeire League',
          image: '/event_english_premiere_league.png',
          odds: '50:1',
          return: '29x',
          wagers: 507,
        },
      ]
    }
  }
}
</script>

