import * as profileModule from './profile'

describe('@state/modules/profile', () => {
  it('exports a valid Vuex module', () => {
    expect(profileModule).toBeAVuexModule()
  })
})
