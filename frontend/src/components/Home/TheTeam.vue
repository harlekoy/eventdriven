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
      v-for="(item, index) in teams"
      :key="index"
      class="carousel-inner">
      <Card :info="item" :page="'team'"/>
    </Slide>

  </Carousel>
</template>

<script>
import Card from '@components/Card'
import { Carousel, Slide } from 'vue-carousel'
import {mapGetters, mapActions} from 'vuex'

export default {
  components: {
    Card,
    Carousel,
    Slide
  },

  mounted() {
    this.fetchTeams()
  },

  computed: {
    ...mapGetters({
      teams: 'teams/getTeams'
    }),
  },
  

  methods: {
    ...mapActions({
      fetchTeams: 'teams/fetchTeams'
    })
  },

  data() {
    return {

    }
  }
}
</script>

