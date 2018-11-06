import axios from 'axios'
import qs from 'qs'
import store from '@state/store'
import { fail } from '@utils/toast'
import { getSavedState } from '@utils/localStorage'
import router from '@router'

axios.defaults.baseURL = process.env.VUE_APP_API_URL
axios.defaults.paramsSerializer = params => qs.stringify(params, {arrayFormat: 'repeat'})

axios.interceptors.request.use(request => {
  const user = getSavedState('auth.currentUser')

  if (user) {
    request.headers.common['Authorization'] = `Bearer ${user.id_token}`
    request.headers.common['X-Sport-League'] = 'nba'
  }

  return request
})

axios.interceptors.response.use(response => response, async (error) => {
  const { status, data: { message }} = error.response

  switch (status) {
    case 401:
      store.dispatch('auth/logOut')
      // router.push({ name: 'login' })
    break
    case 403:
    case 404:
      fail({
        text: message,
        timer: 5000,
      })
    break

    case 500:
      fail({
        title: 'Error!',
        text: message,
        timer: 5000,
        position: 'bottom-right',
        width: 500,
      })
    break
  }

  return Promise.reject(error)
})
