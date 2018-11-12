<template>
  <footer>
    <div class="container mx-auto">
      <router-link 
        to="/" 
        class="uppercase"
      >
        Home
      </router-link>

      <span
        v-for="(item, index) in crumbs"
        :key="index"
      >
        <i 
          v-show="isHome(item.to)" 
          class="icon-down"
        />
        <router-link
          v-show="isHome(item.to)"
          :to="item.to"
          class="uppercase"
        >
          {{ item.text }}
        </router-link>
      </span>
    </div>
  </footer>
</template>

<script>
export default {
  computed: {
    crumbs: function() {
      let pathArray = this.$route.path.split("/")
      pathArray.shift()
      let breadcrumbs = pathArray.reduce((breadcrumbArray, path, idx) => {
        breadcrumbArray.push({
          path: path,
          to: this.$route.matched[idx].path,
          text: this.$route.matched[idx].meta.breadCrumb ||  path
        });
        return breadcrumbArray;
      }, [])
      return breadcrumbs;
    }
  },

  methods: {
    isHome(val) {
      return val != ''
    },
  }
}
</script>


<style lang="scss">
  footer {
    @apply flex;

    > .container {
      @apply flex items-center;
    }

    a {
      @apply text-white no-underline font-bold text-xs mr-3;
    }

    i {
      @apply text-yellow mr-3 inline-block relative;
      font-size: 8px;
      top: -1px;
      transform: rotate(-90deg);
    }
  }
</style>
