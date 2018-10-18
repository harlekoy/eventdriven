<template>
  <carousel :navigationEnabled="true" :perPage="4" :perPageCustom="[[0, 1], [768, 2], [992, 3], [1200, 4]]">
    <slide><card/></slide>
    <slide><card/></slide>
    <slide><card/></slide>
    <slide><card/></slide>
    <slide><card/></slide>
  </carousel>
</template>

<script>
import Card from '@components/Card'
import { Carousel, Slide } from 'vue-carousel';

export default {
  components: {
    Card,
    Carousel,
    Slide
  }
}
</script>

<style lang="scss">
.VueCarousel-inner {
  .VueCarousel-slide {
    padding: 12.5px;
    backface-visibility: unset;
  }
}

.VueCarousel-pagination {
  display: none;
}

.VueCarousel-navigation {
  button.VueCarousel-navigation-button {
    @apply text-transparent rounded-full border-solid border-2 border-green;
    font-family: 'icomoon';
    height: 42px;
    width: 42px;
    padding: 0;

    &::before {
      @apply text-green;
    }

    &.VueCarousel-navigation-prev {
      left: -15px;

      &::before {
        content: '\e905';
      }
    }

    &.VueCarousel-navigation-next {
      right: -15px;

      &::before {
        content: '\e906';
      }
    }
  }
}
</style>
