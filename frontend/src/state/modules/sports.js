import axios from 'axios'

export const state = {
  sports: [],
  tournaments: [],
  competitors: [],
}

export const getters = {
  sports: state => state.sports,
  tournaments: state => state.tournaments,
  competitors: state => state.competitors,
}

export const mutations = {
  SET_SPORTS (state, sports) {
    state.sports = sports
  },

  SET_TOURNAMENTS (state, tournaments) {
    state.tournaments = tournaments
  },

  SET_COMPETITORS (state, competitors) {
    state.competitors = competitors
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

  async fetchCompetitors ({ commit }) {
    const { data: { data } } = await axios.get('/competitors')
    commit('SET_COMPETITORS', data)
  },
}
