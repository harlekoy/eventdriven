import axios from 'axios'
import { filter, groupBy } from 'lodash'

export const state = {
  teams: [],
}

export const getters = {
  teams: state => state.teams,
  sportTeams (state) {
    return groupBy(state.teams, (team) => {
      return team.sport_id
    })
  }
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
