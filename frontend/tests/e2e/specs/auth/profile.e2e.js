describe('Login', () => {
  beforeEach(() => {
    cy.visit('/login')

    cy.get('[name="username"]').type('admin')
    cy.get('[name="password"] input').type('Testing@123{enter}')

    cy.url().should('include', '/')
    cy.contains('h1', 'Gambling just got Smarter.')

    cy.visit('/profile')
  })

  it('Greets Your Profile', () => {
    cy.contains('h1', 'Your Profile')
  })

  it('Requires Fields', () => {
    cy.get('[name="first_name"]').clear()
    cy.get('[name="last_name"]').clear()
    cy.get('[name="username"]').clear()
    cy.get('[name="email"]').clear().type('{enter}')


    cy.get('.invalid').should('contain', 'The first name field is required.')
    cy.get('.invalid').should('contain', 'The last name field is required.')
    cy.get('.invalid').should('contain', 'The username field is required.')
    cy.get('.invalid').should('contain', 'The email field is required.')
  })

  it('Updates Profile', () => {
    cy.get('[name="first_name"]').type('{enter}')
    cy.contains('#swal2-content', 'Account successfully updated.')
  })
})
