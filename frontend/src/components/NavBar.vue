<template>
  <header class="bg-white">
    <nav class="container mx-auto">
      <LeftMenu />
      <RightMenu />
    </nav>
  </header>
</template>

<script>
import LeftMenu from '@components/LeftMenu'
import RightMenu from '@components/RightMenu'

export default {
  components: {
    LeftMenu,
    RightMenu
  }
}
</script>

<style lang="scss">
  @import '@assets/styles/breakpoints.scss';

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
            @apply border-0 pt-2 pb-4 justify-center;
          }
        }

        > .item {
          @apply items-center justify-center text-xl relative cursor-pointer;
          border-bottom: 5px solid transparent;
          padding: 5px 40px 0 30px;

          @include breakpoint-min(md) {
            &:hover {
              border-bottom: 5px solid config('colors.green');

              .menu-dropdown {
                @apply block;
              }

              @include breakpoint-max(md) {
                @apply border-0;
              }
            }
          }

          @include breakpoint-max(md) {
            @apply border-0;
            padding: 10px;

            &.active {
              .menu-dropdown {
                @apply block;
              }
            }
          }

          i {
            @apply absolute pin-b m-auto text-green;
            top: 5px;
            right: 20px;
            height: 10px;
            font-size: 8px;

            @include breakpoint-max(md) {
              @apply hidden;
            }
          }
        }
      }

      > .right {
        @apply flex items-center;

        @include breakpoint-max(md) {
          @apply justify-center flex-wrap;
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
