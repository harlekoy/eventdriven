<template>
  <Carousel
    class="carousel"
    :pagination-enabled="false"
    :navigation-enabled="true"
    :per-page="4"
    :per-page-custom="[[0, 1], [768, 2], [992, 3], [1200, 4]]"
  >
    <Slide class="carousel-inner">
      <Card />
    </Slide>
    <Slide class="carousel-inner">
      <Card />
    </Slide>
    <Slide class="carousel-inner">
      <Card />
    </Slide>
    <Slide class="carousel-inner">
      <Card />
    </Slide>
    <Slide class="carousel-inner">
      <Card />
    </Slide>
  </Carousel>
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
          content: '\e908';
        }
      }

      &:last-child {
        right: -15px;

        &::before {
          content: '\e909';
        }
      }
    }
  }
}
</style>
