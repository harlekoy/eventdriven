import axios from 'axios'
import qs from 'qs'
import router from '@router'
import { getSavedState, saveState } from '@utils/localStorage'
import { signin, signup, forgot } from '@utils/auth'
import Cookies from "js-cookie";

export const state = {
  currentUser: getSavedState('auth.currentUser'),
  remember_me: false,
}

export const mutations = {
  SET_CURRENT_USER(state, newValue) {
    state.currentUser = newValue
    saveState('auth.currentUser', newValue)
  },

  SAVE_TOKEN(state, {remember_me}) {
    state.remember_me = remember_me
    Cookies.set('remember', remember_me, { expires: remember_me ? 365 : null })
  }
}

export const getters = {
  // Whether the user is currently logged in.
  loggedIn(state) {
    return !!state.currentUser
  },

  user () {
    return state.currentUser
  },
}

export const actions = {
  // Logs in the current user.
  async logIn(context, { username, password, cb } = {}) {
    signin(username, password, cb)
  },

  // This handles the Auth0 callback
  async handleAuth ({ commit }) {
    let response = qs.parse(
      router
        .currentRoute
        .hash
        .substring(1)
    )

    const { data: { data }} = await axios.get('auth', {
      headers: {
        Authorization: `Bearer ${response.id_token}`
      }
    })

    commit('SET_CURRENT_USER', Object.assign(response, data))
  },

  // Logs out the current user.
  logOut({ commit }) {
    commit('SET_CURRENT_USER', null)
  },

  signUp ({ commit }, { data, cb }) {
    signup(data, cb)
  },

  saveToken({ commit }, payload) {
    commit('SAVE_TOKEN', payload)
  },

  forgotPassword({ commit }, { email, cb }) {
    forgot(email, cb)
  }
}
