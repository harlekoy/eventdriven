import axios from 'axios'

export const state = {
  events: [],
  event: []
}

export const getters = {
  getEvents: state => state.events,
  getEvent: state => state.event
}

export const mutations = {
  SET_EVENTS (state, events) {
    state.events = events
  },

  SET_EVENT (state, event) {
    state.event = event
  },
}

export const actions = {
  async fetchEvents ({commit}) {
    const { data: { data } } = await axios.get('/sports')
    commit('SET_EVENTS', data)
  },

  async fetchEvent({commit}, id) {
    const { data: { data } } = await axios.get(`/sport-events/${id}`)
    commit('SET_EVENT', data)
  }


}
