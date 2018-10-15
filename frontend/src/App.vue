<template>
<div>
  <div class="container mx-auto">
    <router-view
      :auth="auth"
      :authenticated="authenticated">
    </router-view>
  </div>
</div>
</template>

<script>
import appConfig from '@src/app.config'
import AuthService from '@auth'

const auth = new AuthService()

const { login, logout, authenticated, authNotifier } = auth

export default {
  page: {
    // All subcomponent titles will be injected into this template.
    titleTemplate(title) {
      title = typeof title === 'function' ? title(this.$store) : title
      return title ? `${title} | ${appConfig.title}` : appConfig.title
    },
  },

  data () {
    authNotifier.on('authChange', authState => {
      this.authenticated = authState.authenticated
    })
    return {
      auth,
      authenticated
    }
  },

  methods: {
    login,
    logout
  }
}
</script>

<!-- This should generally be the only global CSS in the app. -->
<style lang="scss">
@import 'assets/styles/tailwind.postcss';

// Style loading bar between pages.
// https://github.com/rstacruz/nprogress
@import '~nprogress/nprogress.css';

// Design variables and utilities from src/design.
@import '@design';


// ===
// Vendor
// ===

#nprogress .bar {
  background: $color-link-text;
}
</style>
