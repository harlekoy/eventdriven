import * as eventsModule from './events'

describe('@state/modules/events', () => {
  it('exports a valid Vuex module', () => {
    expect(eventsModule).toBeAVuexModule()
  })
})
