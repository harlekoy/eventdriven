<template>
  <div class="right relative">
    <a 
      href="#" 
      class="item"
    >
      Help
      <i class="icon-help" />
    </a>
    <template v-if="loggedIn">
      <div
        v-click-outside="hideDropdown"
        class="item"
        @click="toggleDropdown"
      >
        £9,054
        <LazyLoad 
          v-if="avatar" 
          :src="avatar"
        >
          <img 
            class="w-9 h-9 rounded-full block ml-2" 
            :src="avatar"
          >
          <div 
            slot="placeholder" 
            class="ml-2 flex justify-center items-center w-9 h-9 bg-grey-lighter text-grey-darker rounded-full"
          >
            <BaseIcon
              class="text-sm z-50"
              name="spinner"
              spin
            />
          </div>
        </LazyLoad>
        <i 
          v-else 
          class="icon-user"
        />
        <div
          class="account-dropdown"
          :class="{ active }"
        >
          <router-link
            :to="{ name: 'dashboard' }"
            class="item"
          >
            Your Dashboard
          </router-link>
          <router-link
            :to="{ name: 'profile' }"
            class="item"
          >
            Your Profile
          </router-link>
          <a
            class="item"
            @click="logout"
          >
            Logout
          </a>
        </div>
      </div>
    </template>
    <template v-else>
      <router-link
        :to="{ name: 'login' }"
        class="item"
      >
        Login
      </router-link>
      <router-link
        :to="{ name: 'register' }"
        class="item bordered"
      >
        Sign Up
      </router-link>
    </template>
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'
import ClickOutside from 'vue-click-outside'
import { VueClazyLoad } from 'vue-clazy-load'

export default {
  components: {
    LazyLoad: VueClazyLoad,
  },

  data () {
    return {
      active: false
    }
  },

  computed: {
    ...mapGetters({
      loggedIn: 'auth/loggedIn',
      user: 'auth/user',
    }),

    avatar () {
      if (this.user) {
        return this.user.avatar
      }
    }
  },

  methods: {
    ...mapActions({
      logOut: 'auth/logOut'
    }),

    logout () {
      this.logOut()
      this.$router.push({ name: 'home' })
    },

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
  .account-dropdown {
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
