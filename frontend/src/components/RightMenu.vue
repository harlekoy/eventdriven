<template>
  <div class="right relative">
    <div class="item">
      Help
      <i class="icon-help"></i>
    </div>
    <template v-if="loggedIn">
      <div class="item" @click="toggleDropdown" v-click-outside="hideDropdown">
        £9,054
        <i class="icon-user"></i>
        <div class="dropdown" :class="{ active }">
          <a href="#" class="item">Your Dashboard</a>
          <router-link
            :to="{ name: 'profile' }"
            class="item"
          >
            Your Profile
          </router-link>
          <a @click="logout" class="item">Logout</a>
        </div>
      </div>
    </template>
    <template v-else>
      <router-link :to="{ name: 'login' }" class="item">
        Login
      </router-link>
      <router-link :to="{ name: 'register' }" class="item bordered">
        Sign Up
      </router-link>
    </template>
  </div>
</template>

<script>
  import { mapGetters, mapActions } from 'vuex'
  import ClickOutside from 'vue-click-outside'

  export default {
    data () {
      return {
        active: false
      }
    },

    computed: {
      ...mapGetters({
        loggedIn: 'auth/loggedIn'
      })
    },

    methods: {
      ...mapActions({
        logout: 'auth/logOut'
      }),

      toggleDropdown () {
        this.active = !this.active
      },

      hideDropdown () {
        if (this.active) {
          this.active = false
        }
      }
    },

    directives: {
      ClickOutside
    }
  }
</script>

<style lang="scss">
  .dropdown {
    @apply absolute pin-r bg-black-trans opacity-0;
    top: 95%;
    padding: 23px;
    min-width: 238px;
    pointer-events: none;
    transition: .25s all;

    &.active {
      opacity: 1;
      top: 100%;
      pointer-events: auto;
    }

    &::before {
      @apply absolute;
      content: '';
      right: 10px;
      top: -10px;
      border-left: 10px solid transparent;
      border-right: 10px solid transparent;
      border-bottom: 10px solid config('colors.black-trans');
    }

    .item {
      @apply whitespace-no-wrap block text-white text-sm mb-4 cursor-pointer;

      &:hover {
        @apply text-green;
      }

      &:last-child {
        @apply mb-0;
      }
    }
  }
</style>
