import axios from 'axios'

export const state = {
  sports: []
}

export const getters = {
  sports: state => state.sports
}

export const mutations = {
  SET_SPORTS (state, sports) {
    state.sports = sports
  }
}

export const actions = {
  async fetchSports ({ commit }) {
    const { data: { data } } = await axios.get('/sports')
    commit('SET_SPORTS', data)
  }
}
