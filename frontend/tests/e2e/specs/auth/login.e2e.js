describe('Login', () => {
  beforeEach(() => {
    window.localStorage.setItem('auth.currentUser', null)
    cy.visit('/login')
  })

  it('Greets Sign In', () => {
    cy.contains('h1', 'Login')
  })

  it('Has a register link', () => {
    cy
      .contains('Create new account')
      .should('have.attr', 'href', '/register')
  })

  it('Has a forgot password link', () => {
    cy
      .contains('Forgot Password')
      .should('have.attr', 'href', '/forgot-password')
  })

  it('Requires Valid Email & Password', () => {
    cy.contains('form', 'Log in').click()
    cy.get('.invalid').should('contain', 'The email field is required.')
    cy.get('.invalid').should('contain', 'The password field is required.')
  })

  it('Redirect # When Logged In', () => {
    cy.get('[name="email"]').type('admin@admin.com')
    cy.get('[name="password"] input').type('Testing@123{enter}')
    cy.url().should('include', '/')
  })

  it('Redirect # When Logged In (Middleware)', () => {
    cy.get('[name="email"]').type('admin@admin.com')
    cy.get('[name="password"] input').type('Testing@123{enter}')
    cy.url().should('eq', window.location.origin + '/')
    cy.visit('/login')
    cy.url().should('eq', window.location.origin + '/')
  })
})
