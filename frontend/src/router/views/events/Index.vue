<template>
  <Layout>
    <div class="container mx-auto my-10">
      <router-view />
    </div>
  </Layout>
</template>

<script>
import appConfig from '@src/app.config'
import Layout from '@layouts/Main'
import Tabs from '@components/FrontTabs'

import ToWin from './ToWin'
import PropositionBets from './PropositionBets'

export default {
  page: {
    title: 'Competition',
    meta: [{ name: 'description', content: appConfig.description }],
  },

  components: {
    Layout,
    Tabs,
    ToWin,
    PropositionBets,
  },

  data() {
    return {
      currentTab: 'to-win',
      tabSettings: [
        { 
          label: 'TO WIN', 
          value: 'to-win' 
        },
        { label: 'PROPOSITION BETS', 
          value: 'proposition-bets' 
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
