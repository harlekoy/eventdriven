<template>
  <section v-if="events.length">
    <h3 class="text-center mt-12 mb-10">
      Events
    </h3>
    <Carousel
      class="carousel"
      :pagination-enabled="false"
      :navigation-enabled="true"
      :per-page="4"
      :per-page-custom="[[0, 1], [768, 2], [992, 3], [1200, 4]]"
    >
      <Slide
        v-for="(item, index) in events"
        :key="index"
        class="carousel-inner"
      >
        <Card
          :info="item"
          :page="'events'"
        />
      </Slide>
    </Carousel>
  </section>
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
    this.fetchEvents()
  },

  computed: {
    ...mapGetters({
      events: 'events/getEvents'
    }),
  },


  methods: {
    ...mapActions({
      fetchEvents: 'events/fetchEvents'
    })
  },

  data() {
    return {

    }
  }
}
</script>

