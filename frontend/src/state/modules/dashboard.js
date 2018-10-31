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
  currentTab: 'all-recent-activity'
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

