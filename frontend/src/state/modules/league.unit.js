import * as leagueModule from './league'

describe('@state/modules/league', () => {
  it('exports a valid Vuex module', () => {
    expect(leagueModule).toBeAVuexModule()
  })
})
