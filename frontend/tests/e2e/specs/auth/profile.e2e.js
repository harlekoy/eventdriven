describe('Login', () => {
  beforeEach(() => {
    window.localStorage.setItem('auth.currentUser', null)
    cy.visit('/login')

    cy.get('[name="email"]').type('admin@admin.com')
    cy.get('[name="password"] input').type('Testing@123{enter}')

    cy.url().should('include', '/')
    cy.contains('h1', 'Gambling just got Smarter.')

    cy.visit('/profile')
  })

  it('Greets Your Profile', () => {
    cy.contains('h1', 'Your Profile')
  })

  it('Requires Fields', () => {
    cy.get('[placeholder="First Name"]').clear()
    cy.get('[placeholder="Last Name"]').clear()
    cy.get('[placeholder="Date of Birth"]').clear()
    cy.get('[placeholder="Email Address"]').clear().type('{enter}')

    cy.get('.invalid').should('contain', 'The first name field is required.')
    cy.get('.invalid').should('contain', 'The last name field is required.')
    cy.get('.invalid').should('contain', 'The email field is required.')
  })

  it('Updates Profile', () => {
    cy.get('[placeholder="First Name"]').type('{enter}')
    cy.contains('#swal2-title', 'Success!')
  })
})
