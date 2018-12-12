<!-- eslint-disable -->

<template>
  <div class="right relative">

    <!-- Help -->
    <a href="https://betprophet.zendesk.com/hc/en-us" class="item">Help <i class="icon-help" /></a>

    <!-- Logged -->
    <template v-if="loggedIn">
      <div v-click-outside="hideDropdown" class="item" @click="toggeDropdown">

        <!-- Label -->
        £9,054

        <!-- Avatar/Loader -->
        <LazyLoad v-if="avatar" :src="avatar">
          <img class="w-9 h-9 rounded-full block ml-2" :src="avatar"/>
          <div slot="placeholder" class="ml-2 flex justify-center items-center w-9 h-9 bg-grey-lighter text-grey-darker rounded-full">
            <BaseIcon class="text-sm z-50" name="spinner" spin/>
          </div>
        </LazyLoad>
        <i v-else class="icon-user"/>
        <div class="account-dropdown" :class="{ active }">
          <router-link :to="{ name: 'dashboard' }" class="item">
            Your Dashboard
          </router-link>
          <router-link :to="{ name: 'profile' }" class="item">
            Your Profile
          </router-link>
          <a class="item" @click="toggleLogout">
            Logout
          </a>
        </div>
      </div>
    </template>

    <!-- Guest -->
    <template v-else>
      <router-link :to="{ name: 'login' }" class="item">Login</router-link>
      <router-link :to="{ name: 'register' }" class="item bordered">Sign Up</router-link>
    </template>

  </div>
</template>

<script>
import ClickOutside from 'vue-click-outside'
import { mapGetters, mapActions } from 'vuex'
import { VueClazyLoad } from 'vue-clazy-load'

export default {
  components: {
    LazyLoad: VueClazyLoad,
  },

  directives: {
    ClickOutside
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
      authLogout: 'auth/logOut'
    }),

    async toggleLogout () {
      await this.authLogout()
      this.$router.push({ name: 'home' })

      success({ text: 'You are now logged out!' })
    },

    toggeDropdown () {
      this.active = !this.active
    },

    hideDropdown () {
      this.active = false
    }
  }
}
</script>
