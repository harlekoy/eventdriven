import store from '@state/store'
import auth from '@middlewares/auth'

export default [
  {
    path: '/',
    name: 'home',
    component: () => lazyLoadView(import('@views/Home')),
    meta: {
      breadCrumb: 'Home'
    }
  },
  {
    path: '/team',
    name: 'team',
    component: () => lazyLoadView(import('@views/TeamIntermediary')),
    meta: {
      breadCrumb: 'Team'
    }
  },
  {
    path: '/player',
    name: 'player',
    component: () => lazyLoadView(import('@views/player/Index')),
    meta: {
      breadCrumb: 'Player'
    }
  },
  {
    path: '/events',
    name: 'event',
    redirect: '/events/competition',
    component: () => lazyLoadView(import('@views/events/Index')),
    meta: {
      breadCrumb: 'Events'
    },
    children:[
      {
        path: '/events/competition',
        name: 'competition',
        component: () => lazyLoadView(import('@views/events/Competition')),
        meta: {
          breadCrumb: 'Competition'
        },
      },
      {
        path: '/events/gameline',
        name: 'gameline',
        component: () => lazyLoadView(import('@views/events/gameline/GameLine')),
        meta: {
          breadCrumb: 'Gameline'
        },
      },
      {
        path: '/events/all-game-lines',
        name: 'all-game-lines',
        component: () => lazyLoadView(import('@views/events/AllGameLines')),
        meta: {
          breadCrumb: 'All Game Lines'
        }  
      },
    ]
  },
  {
    path: '/callback',
    name: 'callback',
    component: () => lazyLoadView(import('@views/Callback')),
  },
  {
    path: '/register',
    name: 'register',
    component: () => lazyLoadView(import('@views/auth/Register')),
    meta: {
      breadCrumb: 'Register'
    }
  },
  {
    path: '/reset-password/:token',
    name: 'reset-password',
    component: () => lazyLoadView(import('@views/ResetPassword')),
    meta: {
      breadCrumb: 'Reset Password'
    }
  },
  {
    path: '/forgot-password',
    name: 'forgot-password',
    component: () => lazyLoadView(import('@views/ForgotPassword')),
    meta: {
      breadCrumb: 'Forgot Password'
    }
  },
  {
    path: '/change-password',
    name: 'change-password',
    component: () => lazyLoadView(import('@views/settings/ChangePassword')),
    meta: {
      breadCrumb: 'Change Password'
    },
  },
  {
    path: '/login',
    name: 'login',
    component: () => lazyLoadView(import('@views/auth/Login')),
    beforeEnter: auth,
    meta: {
      breadCrumb: 'Login'
    },
  },
  {
    path: '/profile',
    name: 'profile',
    component: () => lazyLoadView(import('@views/settings/Profile')),
    meta: {
      authRequired: true,
      breadCrumb: 'Profile'
    },
  },
  {
    path: '/sell',
    name: 'sell',
    component: () => lazyLoadView(import('@views/sell/Sell')),
    meta: {
      authRequired: true,
      breadCrumb: 'Sell'
    },
  },
  {
    path: '/dashboard',
    name: 'dashboard',
    component: () => lazyLoadView(import('@views/Dashboard')),
    meta: {
      authRequired: true,
      breadCrumb: 'Dashboard'
    },
  },
  {
    path: '/logout',
    name: 'logout',
    meta: {
      authRequired: true,
    },
    beforeEnter(routeTo, routeFrom, next) {
      store.dispatch('auth/logOut')
      const authRequiredOnPreviousRoute = routeFrom.matched.some(
        route => route.meta.authRequired
      )
      // Navigate back to previous page, or home as a fallback
      next(authRequiredOnPreviousRoute ? { name: 'home' } : { ...routeFrom })
    },
  },
  {
    path: '/404',
    name: '404',
    component: require('@views/404').default,
    // Allows props to be passed to the 404 page through route
    // params, such as `resource` to define what wasn't found.
    props: true,
  },
  // Redirect any unmatched routes to the 404 page. This may
  // require some server configuration to work in production:
  // https://router.vuejs.org/en/essentials/history-mode.html#example-server-configurations
  {
    path: '*',
    redirect: '404',
  },
]

// Lazy-loads view components, but with better UX. A loading view
// will be used if the component takes a while to load, falling
// back to a timeout view in case the page fails to load. You can
// use this component to lazy-load a route with:
//
// component: () => lazyLoadView(import('@views/my-view'))
//
// NOTE: Components loaded with this strategy DO NOT have access
// to in-component guards, such as beforeRouteEnter,
// beforeRouteUpdate, and beforeRouteLeave. You must either use
// route-level guards instead or lazy-load the component directly:
//
// component: () => import('@views/my-view')
//
function lazyLoadView(AsyncView) {
  const AsyncHandler = () => ({
    component: AsyncView,
    // A component to use while the component is loading.
    loading: require('@views/Loading').default,
    // A fallback component in case the timeout is exceeded
    // when loading the component.
    error: require('@views/TimeOutView').default,
    // Delay before showing the loading component.
    // Default: 200 (milliseconds).
    delay: 400,
    // Time before giving up trying to load the component.
    // Default: Infinity (milliseconds).
    timeout: 10000,
  })

  return Promise.resolve({
    functional: true,
    render(h, { data, children }) {
      // Transparently pass any props or children
      // to the view component.
      return h(AsyncHandler, data, children)
    },
  })
}
