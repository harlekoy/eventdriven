<template>
  <div id="app">
    <router-view :key="$route.fullPath" />
  </div>
</template>

<script>
import appConfig from '@src/app.config'

export default {
  page: {
    // All subcomponent titles will be injected into this template.
    titleTemplate(title) {
      title = typeof title === 'function' ? title(this.$store) : title
      return title ? `${title} | ${appConfig.title}` : appConfig.title
    }
  }
}
</script>

<style lang="scss">

// Tailwind
@import 'assets/styles/tailwind.postcss';

// Loading Bars
@import '~nprogress/nprogress.css';

// Global Stylesheets
@import '@design';

</style>
