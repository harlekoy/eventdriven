import * as dashboardModule from './dashboard'

describe('@state/modules/dashboard', () => {
  it('exports a valid Vuex module', () => {
    expect(dashboardModule).toBeAVuexModule()
  })
})
