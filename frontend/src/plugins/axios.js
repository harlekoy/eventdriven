import axios from 'axios'
import qs from 'qs'
import { getSavedState } from '@utils/localStorage'

axios.defaults.baseURL = process.env.VUE_APP_API_URL
axios.defaults.paramsSerializer = params => qs.stringify(params, {arrayFormat: 'repeat'})

axios.interceptors.request.use(request => {
  const user = getSavedState('auth.currentUser')

  if (user) {
    request.headers.common['Authorization'] = `Bearer ${user.id_token}`
  }

  return request
})

axios.interceptors.response.use(response => response, async (error) => {
  const { status } = error.response

  if (status === 403) {
    alert(status)
  } else if (status === 404) {
    alert(status)
  }

  return Promise.reject(error)
})
