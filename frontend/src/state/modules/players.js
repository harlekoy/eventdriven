import axios from 'axios'

export const state = {
  players: []
}

export const getters = {
  getPlayers: state => state.players
}

export const mutations = {
  SET_PLAYERS (state, players) {
    state.players = players
  }
}

export const actions = {
  async fetchPlayers ({commit}) {
    const { data: { data } } = await axios.get('/players')
    commit('SET_PLAYERS', data)
  }
}
