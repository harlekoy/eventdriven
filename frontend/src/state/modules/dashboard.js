export const state = {
  tabComponents: [
    {
      title: 'All Recent Activity',
      slug: 'all-recent-activity'
    },
    {
      title: 'Open Bets',
      slug: 'open-bets'
    },
    {
      title: 'Bought',
      slug: 'bought'
    },
    {
      title: 'Sold',
      slug: 'sold'
    },
  ],
  currentTab: 'all-recent-activity',

  recentActivity: [
    {
      date: '11/18/18',
      wager: 'Manchester United',
      odds: '29:1',
      total: 985
    },
    {
      date: '11/19/18',
      wager: 'FC Barcelona',
      odds: '20:1',
      total: 685
    },
    {
      date: '11/21/18',
      wager: 'Manchester United',
      odds: '40:1',
      total: 400
    },
  ]
}

export const getters = {
  getDashboardTabComponents: state => state.tabComponents,
  getCurrentTab: state => state.currentTab,
  currentTabComponent: state => {
    switch( state.currentTab ) {
      case 'open-bets':
        return 'OpenBets'
        break;
      case 'bought':
        return 'Bought'
        break;
      case 'sold':
        return 'Sold'
        break;
      default:
        return 'AllRecentActivity'
    }
  },

  getRecentActivity: state => state.recentActivity,
}

export const mutations = {
  CHANGE_DASHBOARD_TAB(state, payload) {
    state.currentTab = payload
  }
}

export const actions = {
  changeTab({commit}, payload) {
    commit('CHANGE_DASHBOARD_TAB', payload)
  }
}

