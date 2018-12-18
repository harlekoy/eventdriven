import axios from 'axios'
import qs from 'qs'
import router from '@router'
import { getSavedState, saveState } from '@utils/localStorage'
import Cookies from "js-cookie"
import { fail, success } from '@utils/toast'

export const state = {
  currentUser: getSavedState('auth.currentUser'),
  address: {},
  remember_me: false,
}

export const mutations = {
  SET_CURRENT_USER (state, newValue) {
    state.currentUser = newValue
    saveState('auth.currentUser', newValue)
  },

  SAVE_TOKEN (state, { remember_me }) {
    state.remember_me = remember_me
    Cookies.set('remember', remember_me, { expires: remember_me ? 365 : null })
  },

  SET_ADDRESS (state, address) {
    state.address = address
  }
}

export const getters = {
  // Whether the user is currently logged in.
  loggedIn (state) {
    return !!state.currentUser
  },

  user (state) {
    return state.currentUser
  },

  address (state) {
    return state.address
  }
}

export const actions = {
  // This handles the Auth0 callback.
  async handleAuth ({ commit }, token) {
    const { data: { data }} = await axios.get('auth', {
      headers: {
        Authorization: `Bearer ${token}`
      }
    })

    data.token = token

    commit('SET_CURRENT_USER', data)

    success({ text: 'You have successfully logged in!' })
    // Redirect to the originally requested page, or to the home page
    router.push(router.currentRoute.query.redirectFrom || { name: 'home' })
  },

  // Logs out the current user.
  logOut ({ commit }) {
    commit('SET_CURRENT_USER', null)
  },

  saveToken ({ commit }, payload) {
    commit('SAVE_TOKEN', payload)
  },

  async setUserAddress ({ commit, state }) {
    try {
      const { data: { data } } = await axios.get(`users/${state.currentUser.id}/addresses`)

      commit('SET_ADDRESS', data[0])
    } catch (e) {}
  },

  updateCurrentUser ({ commit, getters }, data) {
    commit('SET_CURRENT_USER', Object.assign({}, getters.user, data))
  },
}
