import auth0 from 'auth0-js'

let webAuth = new auth0.WebAuth({
  domain: process.env.VUE_APP_AUTH0_DOMAIN,
  clientID: process.env.VUE_APP_AUTH0_CLIENT_ID,
})

export function signin (username, password) {
  webAuth.login({
    realm: process.env.VUE_APP_AUTH0_REALM,
    username,
    password,
    responseType: 'token id_token',
    redirectUri: process.env.VUE_APP_AUTH0_CALLBACK,
  })
}

export function signup ({ username, email, password, metadata }, cb) {
  webAuth.signup({
    connection: process.env.VUE_APP_AUTH0_REALM,
    username,
    email,
    password,
    user_metadata: metadata
  }, cb)
}

export function forgot (email, cb) {
  webAuth.changePassword({
    connection: process.env.VUE_APP_AUTH0_REALM,
    email,
  }, cb)
}
