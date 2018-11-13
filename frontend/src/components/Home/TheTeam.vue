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
      v-for="(item, index) in team_data"
      :key="index"
      class="carousel-inner">
      <Card :info="item" :page="'team'"/>
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
      team_data: [
        {
          name: 'Liverpool',
          image: '/team_liverpool.png',
          odds: '80:1',
          return: '22x',
          wagers: 37,
        },
        {
          name: 'Manchester United',
          image: '/team_manchester_united.png',
          odds: '32:1',
          return: '20x',
          wagers: 227,
        },
        {
          name: 'Chelsea',
          image: '/team_chelsea.png',
          odds: '41:1',
          return: '5x',
          wagers: 300,
        },
        {
          name: 'Arsenal',
          image: '/team_arsenal.png',
          odds: '12:1',
          return: '3x',
          wagers: 88,
        },
      ]
    }
  }
}
</script>

