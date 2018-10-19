import auth0 from 'auth0-js'
import { omit } from 'lodash'

let webAuth = new auth0.WebAuth({
  domain: process.env.VUE_APP_AUTH0_DOMAIN,
  clientID: process.env.VUE_APP_AUTH0_CLIENT_ID,
})

export function signin (username, password, cb) {
  webAuth.login({
    realm: process.env.VUE_APP_AUTH0_REALM,
    username,
    password,
    responseType: 'token id_token',
    redirectUri: process.env.VUE_APP_AUTH0_CALLBACK,
  }, cb)
}

export function signup (data = {}, cb) {
  webAuth.signup({
    connection: process.env.VUE_APP_AUTH0_REALM,
    username: data.username,
    email: data.email,
    password: data.password,
    userMetadata: omit(data, ['username', 'name', 'email', 'password'])
  }, cb)
}

export function forgot (email, cb) {
  webAuth.changePassword({
    connection: process.env.VUE_APP_AUTH0_REALM,
    email,
  }, cb)
}

export function loginViaSocial (connection, cb) {
  webAuth.authorize({
    connection,
    responseType: 'token id_token',
    redirectUri: process.env.VUE_APP_AUTH0_CALLBACK
  }, () => {
  })
}
