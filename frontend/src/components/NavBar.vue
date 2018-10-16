<template>
  <header>
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
      <div class="right">
        <div class="item">
          Help
          <i class="icon-help"></i>
        </div>
        <!-- <div class="item">
          £9,054
          <i class="icon-user"></i>
        </div> -->
        <template>
          <router-link :to="{ name: 'login' }" class="item">
            Login
          </router-link>
          <router-link :to="{ name: 'register' }" class="item bordered">
            Sign Up
          </router-link>
        </template>
      </div>
    </nav>
  </header>
</template>

<script>
import Logo from '@components/Logo'

export default {
  components: {
    Logo
  },
}
</script>

<style lang="scss">
  body {
    font-family: 'Poppins', sans-serif;
  }

  header {
    @apply shadow;

    nav {
      @apply flex justify-between;

      > .left {
        @apply flex;
        min-height: 83px;

        > * {
          @apply border-r border-grey-lighter flex items-center;
        }

        > .logo {
          padding-right: 30px;
        }

        > .item {
          @apply items-center justify-center text-xl relative cursor-pointer;
          border-bottom: 5px solid transparent;
          padding: 5px 40px 0 30px;

          &:hover {
            border-bottom: 5px solid config('colors.green');
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

        .item {
          @apply text-base text-grey items-center flex no-underline;
          margin: 0 0 0 30px;

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
