export const state = {
	currentStep: 1,
  stepItems: ['Bet Details', 'Price your bet', 'Confirmation'],
  players: [
    {
      id: 1,
      name: 'Arsenal'
    },
    {
      id: 2,
      name: 'Bournemouth'
    },
    {
      id: 3,
      name: 'Brighton & Hove Albion'
    },
    {
      id: 4,
      name: 'Burnley'
    },
    {
      id: 5,
      name: 'Cardiff City'
    },
    {
      id: 6,
      name: 'Chelsea'
    },
    {
      id: 7,
      name: 'Crystal Palace'
    },
    {
      id: 8,
      name: 'Everton'
    },
    {
      id: 9,
      name: 'Fulham'
    },
    {
      id: 10,
      name: 'Huddersfield Town'
    },
    {
      id: 11,
      name: 'Leicester City'
    },
    {
      id: 12,
      name: 'Liverpool'
    },
    {
      id: 13,
      name: 'Manchester City'
    },
    {
      id: 14,
      name: 'Manchester United'
    },
  ]
}

export const getters = {
	getCurrentStep: state => state.currentStep,
	getStepItems: state => state.stepItems,
	getPlayers: state => state.players
}

export const mutations = {
  CHANGE_CURRENT_STEP(state, payload) {
    state.currentStep = payload
  },

  NEXT_STEP(state, payload) {
    state.currentStep += payload
  },

  RESET_CURRENT_STEP(state, payload) {
    state.currentStep = payload
  }
}

export const actions = {
  nextStep({commit}, payload) {
    commit('CHANGE_CURRENT_STEP', payload)
  },

  resetStep({commit}) {
    commit('RESET_CURRENT_STEP', 1)
  }
}
  