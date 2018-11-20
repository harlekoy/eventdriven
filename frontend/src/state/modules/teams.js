import axios from 'axios'

export const state = {
  teams: []
}

export const getters = {
  getTeams: state => state.teams
}

export const mutations = {
  SET_TEAMS (state, teams) {
    state.teams = teams
  }
}

export const actions = {
  async fetchTeams ({commit}) {
    const { data: { data } } = await axios.get('/teams')
    commit('SET_TEAMS', data)
  }
}
