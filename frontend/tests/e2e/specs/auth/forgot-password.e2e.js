describe('Forgot Password', () => {
  beforeEach(() => {
    window.localStorage.setItem('auth.currentUser', null)
    cy.visit('/forgot-password')
  })

  it('Greets Forgot Password', () => {
    cy.contains('h1', 'Forgot Password')
  })

  it('Has Login Link', () => {
    cy
      .contains('Have an account? Sign In')
      .should('have.attr', 'href', '/login')
  })

  it('Requires Valid Email', () => {
    cy.contains('form', 'Reset Password').click()
    cy.get('.invalid').should('contain', 'The email field is required.')
  })

  it('Has Alert Message on Success Forgot Passowrd', () => {
    cy.get('[placeholder="Email"]').type('test@test.com{enter}')
    cy.contains('#swal2-title', 'Success!')
  })

  it('Redirect # When Logged In (Middleware)', () => {
    cy.visit('/login')
    cy.get('[name="email"]').type('admin@admin.com')
    cy.get('[name="password"] input').type('Testing@123{enter}')
    cy.url().should('eq', window.location.origin + '/')
    cy.visit('/forgot-password')
    cy.url().should('eq', window.location.origin + '/')
  })
})
