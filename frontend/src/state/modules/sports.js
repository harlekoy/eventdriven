import axios from 'axios'

export const state = {
  sports: [],
  tournaments: [],
}

export const getters = {
  sports: state => state.sports,
  tournaments: state => state.tournaments,
}

export const mutations = {
  SET_SPORTS (state, sports) {
    state.sports = sports
  },

  SET_TOURNAMENTS (state, tournaments) {
    state.tournaments = tournaments
  }
}

export const actions = {
  async fetchSports ({ commit }) {
    const { data: { data } } = await axios.get('/sports')
    commit('SET_SPORTS', data)
  },

  async fetchTournaments ({ commit }) {
    const { data: { data } } = await axios.get('/tournaments')
    commit('SET_TOURNAMENTS', data)
  },
}
