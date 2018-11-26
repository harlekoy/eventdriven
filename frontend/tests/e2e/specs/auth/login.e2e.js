describe('Login', () => {
  beforeEach(() => {
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
    cy.get('.invalid').should('contain', 'The username field is required.')
    cy.get('.invalid').should('contain', 'The username field is required.')
  })

  it('Redirect # When Logged In', () => {
    cy.get('[name="username"]').type('admin')
    cy.get('[name="password"] input').type('Testing@123{enter}')
    cy.url().should('include', '/')
  })
})
