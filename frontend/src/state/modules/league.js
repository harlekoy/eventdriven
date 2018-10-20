import axios from 'axios'

export const state = {
  teams: [],
  players: [],
}

export const getters = {}

export const mutations = {}

export const actions = {
  async fetchTeams () {
    const response = await axios.get('teams')
  },

  async fetchPlayers () {
    const response = await axios.get('players')
  }
}
