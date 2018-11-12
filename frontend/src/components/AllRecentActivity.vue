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
            <span v-text="item.date" />
          </td>
          <td>
            <span v-text="item.wager" />
          </td>
          <td>
            <span v-text="item.odds" />
          </td>
          <td>
            <span v-text="item.total" />
          </td>
          <td>
            <i
              class="icon-trash cursor-pointer"
              @click="remove(item)"
            />
            <button 
              class="btn btn-success btn-xs" 
              @click.prevent="edit(item)"
            >
              EDIT
            </button>
          </td>
        </tr>
      </tbody>
    </table>
    <SidebarRight
      v-if="showSidebarRight"
      ref="rightSidebar"
      :data="recent"
      @close="close"
    />
  </div>
</template>

<style lang="scss" module>
@import '@design';
</style>
