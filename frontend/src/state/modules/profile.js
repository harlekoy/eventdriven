import axios from 'axios'

export const state = {
  info: {},
  avatar: {},
}

export const getters = {
}

export const mutations = {
}

export const actions = {
  async uploadAvatar ({ commit, dispatch, rootGetters }, formData) {
    const { data: { data: avatar }} = await axios.post('/upload', formData)

    dispatch('auth/updateCurrentUser', { avatar: avatar.url }, { root: true })
    await dispatch('updateUser', rootGetters['auth/user'])
  },

  async updateUser ({ commit }, data) {
    return await axios.patch(`user/${data.id}`, data)
  }
}
