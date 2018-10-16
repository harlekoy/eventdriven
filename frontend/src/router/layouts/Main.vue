<template>
  <div class="h-full bg-green-linear">
    <NavBar />
    <div class="content">
      <div class="container mx-auto">
        <slot />
      </div>
    </div>
    <app-footer />
  </div>
</template>

<script>
import NavBar from '@components/NavBar'
import AppFooter from '@components/Footer'

export default {
  components: {
    NavBar,
    AppFooter
  },
}
</script>

<style lang="scss">
  body {
    @apply min-h-screen flex;

    #app {
      @apply flex flex-1;

      > div {
        @apply flex flex-1 flex-col;

        header {
          flex: 0 0 83px;
        }

        .content {
          @apply py-6 relative;
          flex: 1;

          &:before {
            @apply absolute pin-t pin-x z--10;
            content: '';
            background-image: linear-gradient(config('colors.green-light'), config('colors.white'));
            height: 264px;
          }
        }

        footer {
          @apply bg-green-darker;
          flex: 0 0 72px;
        }
      }
    }
  }
</style>
