import auth0 from 'auth0-js'
import axios from 'axios'
import qs from 'qs'
import router from '@router'
import Vue from 'vue'
import { getSavedState, saveState } from '@utils/localStorage'
import { signin, signup, forgot } from '@utils/auth'

export const state = {
  currentUser: getSavedState('auth.currentUser'),
}

export const mutations = {
  SET_CURRENT_USER(state, newValue) {
    state.currentUser = newValue
    saveState('auth.currentUser', newValue)
  },
}

export const getters = {
  // Whether the user is currently logged in.
  loggedIn(state) {
    return !!state.currentUser
  },

  user () {
    return state.currentUser
  }
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

  async signUp ({ commit }, data) {
    await axios.post('signup/validate', data)

    signup(data, async (err, response) => {
    })
  },

  forgotPassword({ commit }, email) {
    forgot(email, (err, response) => {
      console.log('test')
    })
  }
}
