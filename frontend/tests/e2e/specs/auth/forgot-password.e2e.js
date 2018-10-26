describe('Forgot Password', () => {
  beforeEach(() => {
    cy.visit('/password/forgot')
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
    cy.get('.text-red').should('contain', 'email or username are required.')
  })

  it('Has Alert Message on Success Forgot Passowrd', () => {
    cy.get('[type="email"]').type('test@test.com{enter}')
    cy.contains('[role="alert"]', 'We\'ve just sent you an email to reset your password.')
  })
})
