<template>
  <div id="app">
    <router-view :key="$route.fullPath" />
  </div>
</template>

<script>
import appConfig from '@src/app.config'

export default {
  page: {
    titleTemplate(title) {
      // All subcomponent titles will be injected into this template.
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


.btn-loading {
  position: relative;
  pointer-events: none;
  color: transparent !important;
  text-align: right;

  &:after {
    animation: spinAround 500ms infinite linear;
    border: 2px solid #666;
    border-radius: 50%;
    border-right-color: transparent;
    border-top-color: transparent;
    content: "";
    display: block;
    height: 1em;
    width: 1em;
    position: absolute;
    left: calc(50% - (1em / 2));
    top: calc(50% - (1em / 2));
  }
}

@keyframes spinAround {
  from { transform: rotate(0deg); }
  to { transform: rotate(359deg); }
}

</style>
