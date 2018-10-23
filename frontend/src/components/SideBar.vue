<script>
import {mapGetters} from 'vuex'
import Uploader from '@components/Uploader'

export default {
  components: {
    Uploader,
  },

  computed: {
    ...mapGetters({
      menu: 'sidebarMenu/getSidebarMenu'
    })
  }
}
</script>

<template>
  <div class="w-1/4 pr-8 flex justify-end">
    <div class="flex flex-col w-48">
      <Uploader />
      <ul class="list-reset">
        <li 
          v-for="(item, index) in menu"
          :key="index"
          class="py-4 border-b">
          <router-link
            class="text-black font-bold hover:text-green-dark"
            :to="item.path">
            {{item.name}}
          </router-link>
        </li>
      </ul>
    </div>
  </div>
</template>

<style lang="scss">
@import '@design';
</style>
