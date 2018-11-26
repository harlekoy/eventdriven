describe('Register', () => {
  beforeEach(() => {
    cy.visit('/register')
  })

  it('Greets Register', () => {
    cy.contains('h1', 'Register')
  })

  it('Has a Login Link', () => {
    cy
      .contains('Have an account? Sign In')
      .should('have.attr', 'href', '/login')
  })

  it('Requires Input Fields', () => {
    cy.get('form').submit()
    cy.get('.invalid').should('contain', 'The username field is required.')
    cy.get('.invalid').should('contain', 'The first name field is required.')
    cy.get('.invalid').should('contain', 'The last name field is required.')
    cy.get('.invalid').should('contain', 'The email field is required.')
  })

  it('Username Should Be Unique', () => {
    cy.get('[placeholder="Username"]').type('admin')
    cy.get('form').submit()
    cy.get('.invalid').should('contain', 'The username has already been taken.')
  })

  it('Email Should Be Unique', () => {
    cy.get('[placeholder="Email"]').type('admin@admin.com')
    cy.get('form').submit()
    cy.get('.invalid').should('contain', 'The email has already been taken.')
  })

  it('Redirect # When Registered', () => {
    const key = Math.random().toString(36).substring(7)

    cy.get('[placeholder="Username"]').type(`paulo+${key}`)
    cy.get('[placeholder="First Name"]').type('Paulo')
    cy.get('[placeholder="Last Name"]').type('Trajano')
    cy.get('[placeholder="Email"]').type(`paulo+${key}@test.com`)
    cy.get('[placeholder="Address, Country, Postcode"]').type('Cebu City, Cebu, Philippines{downarrow}{enter}', { delay: 20 })
    cy.get('[placeholder="Phone number"]').type('3411733')
    cy.get('[placeholder="Password"]').type('Test@123{enter}')

    cy.url().should('include', '/login')
  })
})
