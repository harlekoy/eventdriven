<template>
  <header class="bg-white">
    <nav class="container mx-auto">
      <div class="left">
        <router-link :to="{ name: 'home' }" class="logo">
          <logo :width="162"/>
        </router-link>
        <div class="item">
          Buy
          <i class="icon-down"></i>
        </div>
        <div class="item">
          Sell
          <i class="icon-down"></i>
        </div>
      </div>
      <right-menu/>
    </nav>
  </header>
</template>

<script>
import Logo from '@components/Logo'
import RightMenu from '@components/RightMenu'
import { mapGetters } from 'vuex'

export default {
  components: {
    Logo,
    RightMenu
  }
}
</script>

<style lang="scss">
  @import '@design';

  body {
    font-family: 'Poppins', sans-serif;
  }

  header {
    @apply shadow relative z-10;

    nav {
      @apply flex justify-between;

      @include breakpoint-max(md) {
        @apply flex-col;
      }

      > .left {
        @apply flex;
        min-height: 83px;

        @include breakpoint-max(md) {
          @apply flex-col;
          padding-top: 10px;
        }

        > * {
          @apply border-r border-grey-lighter flex items-center;
        }

        > .logo {
          padding-right: 30px;

          @include breakpoint-max(md) {
            @apply border-0 p-0 justify-center;
          }
        }

        > .item {
          @apply items-center justify-center text-xl relative cursor-pointer;
          border-bottom: 5px solid transparent;
          padding: 5px 40px 0 30px;

          &:hover {
            border-bottom: 5px solid config('colors.green');

            @include breakpoint-max(md) {
              @apply border-0;
            }
          }

          @include breakpoint-max(md) {
            @apply border-0;
            padding: 10px;
          }

          i {
            @apply absolute pin-b m-auto text-green;
            top: 5px;
            right: 20px;
            height: 10px;
            font-size: 8px;
          }
        }
      }

      > .right {
        @apply flex items-center;

        @include breakpoint-max(md) {
          @apply justify-center pt-4 flex-wrap;
        }

        > .item {
          @apply text-base text-grey items-center flex no-underline;
          margin: 0 0 0 30px;

          @include breakpoint-max(md) {
            @apply m-4;
          }

          .icon-help {
            @apply .text-2xl;
            margin-left: 10px;
          }

          .icon-user {
            @apply .text-4xl;
            margin-left: 10px;
          }
        }
      }
    }
  }

  .bordered {
    @apply .border-3 .border-green .rounded;
    padding: 10px;
  }
</style>
