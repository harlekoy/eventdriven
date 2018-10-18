import axios from 'axios'
import { saveState } from '@utils/localStorage'

export const state = {
  info: {},
  avatar: {},
}

export const getters = {
  avatar: state => state.avatar
}

export const mutations = {
  setAvatar (state, avatar) {
    state.avatar = avatar
  }
}

export const actions = {
  async uploadAvatar ({ commit, dispatch, rootGetters }, formData) {
    const { data: { data: avatar }} = await axios.post('/upload', formData)
    const user = rootGetters['auth/user']

    dispatch('auth/updateCurrentUser', { avatar: avatar.url }, { root: true })
  }
}
