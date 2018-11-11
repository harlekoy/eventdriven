import * as sellModule from './sell'

describe('@state/modules/sell', () => {
  it('exports a valid Vuex module', () => {
    expect(sellModule).toBeAVuexModule()
  })
})
