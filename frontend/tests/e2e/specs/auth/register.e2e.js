describe('Register', () => {
  beforeEach(() => {
    window.localStorage.setItem('auth.currentUser', null)
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
    cy.get('.invalid').should('contain', 'The first name field is required.')
    cy.get('.invalid').should('contain', 'The last name field is required.')
    cy.get('.invalid').should('contain', 'The dob is not a valid date.')
    cy.get('.invalid').should('contain', 'The email field is required.')
    cy.get('.invalid').should('contain', 'The password field is required.')
  })

  it('Email Should Be Unique', () => {
    cy.get('[placeholder="Email"]').type('admin@admin.com')
    cy.get('form').submit()
    cy.get('.invalid').should('contain', 'The email has already been taken.')
  })

  it('Redirect # When Registered', () => {
    const key = Math.random().toString(36).substring(7)

    cy.get('[placeholder="First Name"]').type('Paulo')
    cy.get('[placeholder="Last Name"]').type('Trajano')
    cy.get('[placeholder="Birth of Date"]').click()
    cy.get('.cell.day:last-child').click()
    cy.get('[placeholder="Email"]').type(`paulo+${key}@test.com`)
    cy.get('[placeholder="Address, Country, Postcode"]').type('Cebu City, Cebu, Philippines{downarrow}{enter}', { delay: 20 })
    cy.get('[placeholder="Phone number"]').type('3411733')
    cy.get('[placeholder="Password"]').type('Test@123{enter}')

    cy.contains('#swal2-title', 'Success!')
  })

  it('Redirect # When Logged In (Middleware)', () => {
    cy.visit('/login')
    cy.get('[name="email"]').type('admin@admin.com')
    cy.get('[name="password"] input').type('Testing@123{enter}')
    cy.url().should('eq', window.location.origin + '/')
    cy.visit('/register')
    cy.url().should('eq', window.location.origin + '/')
  })
})
