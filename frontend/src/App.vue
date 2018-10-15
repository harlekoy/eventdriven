<template>
<div id="app">
  <!--
    Even when routes use the same component, treat them
    as distinct and create the component again.
  -->
  <router-view :key="$route.fullPath" />
</div>
</template>

<script>
import appConfig from '@src/app.config'

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
