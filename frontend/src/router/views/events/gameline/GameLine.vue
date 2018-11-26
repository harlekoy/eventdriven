<template>
  <section class="container mx-auto my-10">
    <!-- Tabs -->
    <Tabs
      :tabs="tabSettings"
      @change="currentTab = $event"
    />
    <!-- Tabs End -->

    <!-- Event Information - Fixed -->
    <div class="cols py-4 mb-8">
      <div class="col flex flex-col">
        <div class="flex items-center">
          <img 
            class="pr-4" 
            width="200" 
            src="/images/events/fifa-world-cup.png"
          >
          <div class="">
            <h2 class="font-bold mb-3">
              Manchester United vs Arsenal 	
            </h2>
            <p class="uppercase text-lg font-medium">
              November 30, 2018 14:00 GMT
            </p>
          </div>
        </div>
        <div class="py-3">
          <h4 class="font-medium">
            Current Favorite: <span class="font-thin">
              Manchester United (10:1)
            </span>
          </h4>
        </div>
      </div>
      <div class="w-1/5 flex items-start justify-end">
        <router-link 
          to="/events/all-game-lines" 
          class="btn btn-lg border-green w-min-full uppercase shadow-md"
        >
          See All Game Lines
        </router-link>
      </div>
    </div>

    <!-- Content components -->
    <keep-alive>
      <component :is="currentTabComponent" />
    </keep-alive>
  </section>
</template>

<script>
import appConfig from '@src/app.config'
import Layout from '@layouts/Main'

import Tabs from '@components/FrontTabs'
import PlayerA from './PlayerA'
import PlayerB from './PlayerB'

export default {
  page: {
    title: 'Competition',
    meta: [{ name: 'description', content: appConfig.description }],
  },

  components: {
    Layout,
    Tabs,
    PlayerA,
    PlayerB,
  },

  data() {
    return {
      currentTab: 'player-a',
      tabSettings: [
        { 
          label: 'MANCHESTER UNITED',
          value: 'player-a'
        },
        { label: 'ARSENAL',
          value: 'player-b'
        }
      ],
    }
  },

  computed: {
    currentTabComponent() {
      return this.currentTab
    }
  },
}
</script>
