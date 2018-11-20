import * as teamsModule from './teams'

describe('@state/modules/teams', () => {
  it('exports a valid Vuex module', () => {
    expect(teamsModule).toBeAVuexModule()
  })
})
