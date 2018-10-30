<template>
  <div
    class="banner"
    :style="{ backgroundImage: 'url(' + img + ')' }"
  >
    <div class="container mx-auto">
      <slot />
    </div>
  </div>
</template>

<script>
export default {
  props: {
    img: String
  }
}
</script>

<style lang="scss" scoped>
.banner {
  @apply bg-cover bg-center flex justify-center items-center text-center py-10;
  min-height: 400px;

  &.team {
    @apply items-end relative;

    &::before {
      @apply absolute pin bg-black-light-trans;
      content: '';
    }

    > .container {
      @apply flex items-end relative;

      h1 {
        @apply m-0 flex items-center text-6xl font-normal;

        img {
          margin-right: 17px;
        }
      }
    }
  }

  > .container {
    > * {
      @apply text-white mx-auto;
      max-width: 800px;
    }

    > h6 {
      @apply leading-normal mb-16;
    }

    > .btn {
      min-width: 255px;
    }
  }
}
</style>

