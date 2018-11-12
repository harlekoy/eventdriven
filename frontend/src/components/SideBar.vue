<template>
  <div class="sidebar">
    <Uploader />
    <ul>
      <li 
        v-for="(item, index) in menu" 
        :key="index"
      >
        <router-link 
          class="text font-semibold hover:text-green-dark" 
          active-class="text-green-dark" 
          exact 
          :to="item.path"
        >
          {{ item.name }}
        </router-link>
      </li>
    </ul>
  </div>
</template>

<script>
import { mapGetters } from 'vuex'
import Uploader from '@components/Uploader'

export default {
  components: {
    Uploader
  },

  computed: {
    ...mapGetters({
      menu: 'sidebarMenu/getSidebarMenu'
    })
  }
}
</script>

<style lang="scss" scoped>
  @import '@assets/styles/modules/_breakpoints.scss';
  @import '@assets/styles/modules/_user.scss';
</style>
