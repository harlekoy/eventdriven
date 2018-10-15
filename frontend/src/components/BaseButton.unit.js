import BaseButton from './BaseButton'

describe('@components/BaseButton', () => {
  it('renders its content', () => {
    const slotContent = '<span>foo</span>'
    const { element } = shallowMount(BaseButton, {
      slots: {
        default: slotContent,
      },
    })
    expect(element.innerHTML).toContain(slotContent)
  })
})
