<script>
import SidebarRight from '@components/SidebarRight'
import { mapGetters } from 'vuex';
import { modal } from '@utils/toast'

export default {
  data() {
    return {
      showSidebarRight: false,
      recent: null
    }
  },

  computed: {
    ...mapGetters({
      all_recent_activity: 'dashboard/getRecentActivity'
    })
  },

  methods: {
    edit(item) {
      this.recent = item
      this.showSidebarRight = true
    },

    remove(item) {
      console.log(item)

        modal({
          text: JSON.stringify(item)
        })
    },

    close() {
      this.showSidebarRight = false
    }
  },

  components: {
    SidebarRight
  }
}
</script>

<template>
  <div>
    <table class="main">
      <thead>
        <tr>
          <th>DATE</th>
          <th>WAGER</th>
          <th>ODDS</th>
          <th>TOTAL</th>
          <th>ACTIONS</th>
        </tr>
      </thead>
      <tbody>
        <tr 
          v-for="(item, index) in all_recent_activity"
          :key="index"
          >
          <td>
            <span v-text="item.date"/>
          </td>
          <td>
            <span v-text="item.wager"/>
          </td>
          <td>
            <span v-text="item.odds"/>
          </td>
          <td>
            <span v-text="item.total"/>
          </td>
          <td>
            <i 
              @click="remove(item)"
              class="icon-trash cursor-pointer" />
            <button @click.prevent="edit(item)" class="btn btn-success btn-xs">
              EDIT
            </button>
          </td>
        </tr>
      </tbody>
    </table>
    <SidebarRight
      @close="close"
      :data="recent"
      v-if="showSidebarRight"
      ref="rightSidebar"/>
  </div>

</template>

<style lang="scss" module>
@import '@design';
</style>
