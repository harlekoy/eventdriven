<template>
  <div class="tabs">
    <router-link 
      v-for="(tab, key) in tabs" 
      :key="key" 
      :to="{ name: tab.route }" 
      class="tab"
    >
      {{ tab.label }}
    </router-link>
  </div>
</template>

<script>
export default {
  props: {
    tabs: Object
  }
}
</script>

<style lang="scss" scoped>
@import '@assets/styles/breakpoints.scss';

.tabs {
  @apply flex border-b border-grey-light;
  min-width: 131px;

  @include breakpoint-max(md) {
    @apply flex-col;
  }

  > .tab {
    @apply bg-white text-base font-semibold;
    margin-right: 1px;
    padding: 0 23px;
    line-height: 50px;

    @include breakpoint-max(md) {
      @apply mr-0;
      margin-bottom: 1px;
    }

    &.router-link-exact-active {
      @apply bg-green text-white;
    }
  }
}
</style>
