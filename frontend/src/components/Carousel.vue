<template>
  <carousel class="carousel" :paginationEnabled="false" :navigationEnabled="true" :perPage="4" :perPageCustom="[[0, 1], [768, 2], [992, 3], [1200, 4]]">
    <slide class="carousel-inner"><card/></slide>
    <slide class="carousel-inner"><card/></slide>
    <slide class="carousel-inner"><card/></slide>
    <slide class="carousel-inner"><card/></slide>
    <slide class="carousel-inner"><card/></slide>
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
.carousel {
  .carousel-inner {
    padding: 12.5px;
    backface-visibility: unset;
  }

  :last-child {
    button {
      @apply text-transparent rounded-full border-solid border-2 border-green;
      font-family: 'icomoon';
      height: 42px;
      width: 42px;
      padding: 0;

      &::before {
        @apply text-green;
      }

      &:first-child {
        left: -15px;

        &::before {
          content: '\e905';
        }
      }

      &:last-child {
        right: -15px;

        &::before {
          content: '\e906';
        }
      }
    }
  }
}
</style>
