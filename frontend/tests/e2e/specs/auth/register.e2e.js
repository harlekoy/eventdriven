describe('Register', () => {
  beforeEach(() => {
    cy.visit('/register')
  })

  it('Greets Sign In', () => {
    cy.contains('h1', 'Sign up')
  })

  it('Greets Sign In', () => {
    cy.contains('h1', 'Sign up')
  })
})
