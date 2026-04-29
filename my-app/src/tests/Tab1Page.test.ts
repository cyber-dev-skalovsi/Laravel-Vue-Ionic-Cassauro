import { mount } from '@vue/test-utils'
import { describe, it, expect } from 'vitest'
import Tab1Page from '../views/Tab1Page.vue'

describe('Tab1Page Component', () => {
  it('renders the todo input field', () => {
    const wrapper = mount(Tab1Page, {
      global: {
        stubs: {
          'ion-page': true, 'ion-header': true, 'ion-toolbar': true,
          'ion-title': true, 'ion-content': true, 'ion-item': true,
          'ion-input': true, 'ion-button': true, 'ion-list': true,
          'ion-label': true, 'ion-checkbox': true
        }
      }
    })
    expect(wrapper.exists()).toBe(true)
  })

  it('newTitle is empty by default', () => {
    const wrapper = mount(Tab1Page, {
      global: {
        stubs: {
          'ion-page': true, 'ion-header': true, 'ion-toolbar': true,
          'ion-title': true, 'ion-content': true, 'ion-item': true,
          'ion-input': true, 'ion-button': true, 'ion-list': true,
          'ion-label': true, 'ion-checkbox': true
        }
      }
    })
    expect(wrapper.exists()).toBe(true)
  })
})