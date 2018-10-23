import * as sidebarMenuModule from './sidebar-menu'

describe('@state/modules/sidebar-menu', () => {
  it('exports a valid Vuex module', () => {
    expect(sidebarMenuModule).toBeAVuexModule()
  })
})
