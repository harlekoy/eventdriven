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

export default {
  page: {
    // All subcomponent titles will be injected into this template.
    titleTemplate(title) {
      title = typeof title === 'function' ? title(this.$store) : title
      return title ? `${title} | ${appConfig.title}` : appConfig.title
    },
  },
}
</script>

<!-- This should generally be the only global CSS in the app. -->
<style lang="scss">
@import 'assets/styles/tailwind.postcss';

html, body, #app {
  @apply h-full;
}
// Style loading bar between pages.
// https://github.com/rstacruz/nprogress
@import '~nprogress/nprogress.css';

// Design variables and utilities from src/design.
@import '@design';

// Font
@import url('https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700');

// ===
// Vendor
// ===

#nprogress .bar {
  background: $color-link-text;
}

h1 {
  @apply text-5xl font-light;
}

h6 {
  @apply text-xl font-light;
}

.btn {
  @apply uppercase  rounded border-3;
  line-height: 55px;

  &.btn-plain {
    @apply border-white text-lg px-5;
  }
}
</style>
