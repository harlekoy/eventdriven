import Vue from 'vue'
import hAuth from 'vue-auth0-handler'

const authConfig = {
  clientId: process.env.VUE_APP_AUTH0_CLIENT_ID,
  domain: process.env.VUE_APP_AUTH0_DOMAIN,
  callbackUris: {
    'development': process.env.VUE_APP_AUTH0_DOMAIN,
    'production': 'http://your-application-url.com'
  }
}

// initiate as a Vue plugin:
Vue.use(hAuth, {configuration : authConfig});
