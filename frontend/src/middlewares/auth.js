import store from '@state/store'

export default (to, from, next) => {
  // If the user is already logged in
  if (store.getters['auth/loggedIn']) {
    // Redirect to the home page instead
    next({ name: 'home' })
  } else {
    // Continue to the login page
    next()
  }
}
