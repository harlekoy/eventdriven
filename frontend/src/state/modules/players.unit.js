import * as playersModule from './players'

describe('@state/modules/players', () => {
  it('exports a valid Vuex module', () => {
    expect(playersModule).toBeAVuexModule()
  })
})
