<template>
  <Layout>
    <div class="container mx-auto flex flex-wrap py-8 pb-24">
      <div class="w-full">

        <!-- Tabs -->
        <tabs
          :tabs="tabSettings"
          @change="currentTab = $event"/>

        <!-- Profile - Fixed -->
        <div class="cols py-4 mb-8">
          <div class="col half flex items-center justify-start">
            <img class="pr-4" src="https://via.placeholder.com/100" alt="">
            <h2 class="font-bold">
              Harry Kane
            </h2>
          </div>
          <div class="col half flex items-center justify-end">
            <button class="btn btn-lg border-green w-min-full uppercase shadow-md">
              See Hary Kane's Team Page
            </button>
          </div>
        </div>

        <!-- Content Components -->
        <keep-alive>
          <component :is="currentTabComponent"/>
        </keep-alive>

      </div>
    </div>
  </Layout>
</template>

<script>
import Layout from '@layouts/Main'
import Tabs from '@components/FrontTabs'
import ToWin from './ToWin'
import UpcomingGames from './UpcomingGames'


export default {
  page: {
    title: 'Profile Information',
    meta: [{ name: 'description', content: 'Profile Information' }],
  },

  data() {
    return {
      currentTab: 'to-win',
      tabSettings: [
        { 
          label: 'TO WIN', 
          value: 'to-win' 
        },
        { label: 'UPCOMING GAMES', 
          value: 'upcoming-games' 
        }
      ],
    }
  },

  computed: {
    currentTabComponent() {
      return this.currentTab
    }
  },

  components: { 
    Layout,
    Tabs,
    ToWin,
    UpcomingGames,
  }
}
</script>

<style lang="scss">
// @import '@design';
</style>

