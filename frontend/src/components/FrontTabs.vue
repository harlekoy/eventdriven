<template>
  <div class="tabs">
    <button
      v-for="(tab, key) in tabs" 
      :key="key"
      :class="[{ active: tabActive == key }]"
      @click.prevent="changeTab({ tab: tab.value, key})"
      class="tab">
        {{ tab.label }}
    </button>
  </div>
</template>

<script>
export default {
  props: {
    tabs: [Object, Array],
  },

  data() {
    return {
      tabActive: 0,
    }
  },

  methods: {
    changeTab({tab, key}) {
      this.$emit('change', tab)
      this.tabActive = key
    }
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
    @apply bg-grey-lightest text-base font-semibold;
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

    &.active {
      @apply bg-green-darker text-white;
    }
  }
}
</style>
