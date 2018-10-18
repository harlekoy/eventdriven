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

