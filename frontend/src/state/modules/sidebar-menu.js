export const state = {
  menu: [
    {
      name: 'Dashboard',
      path: { name: 'dashboard' }        
    },
    {
      name: 'Contact Information',
      path: { name: 'profile' }        
    },
    {
      name: 'Change Password',
      path: { name: 'change-password' }        
    },
    {
      name: 'Deposit Funds',
      path: { name: 'home' }        
    },
    {
      name: 'Withdraw Funds',
      path: { name: 'home' }        
    },
  ]
}

export const getters = {
  getSidebarMenu: state => state.menu
}

