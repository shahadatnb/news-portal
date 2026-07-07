import { defineStore } from 'pinia'

export const useMobileMenuStore = defineStore('mobileMenu', {
  state: () => ({
    isOpen: false
  }),

  actions: {
    toggle() {
      this.isOpen = !this.isOpen
      this.updateBodyOverflow()
    },
    open() {
      this.isOpen = true
      this.updateBodyOverflow()
    },
    close() {
      this.isOpen = false
      this.updateBodyOverflow()
    },
    updateBodyOverflow() {
      document.body.style.overflow = this.isOpen ? 'hidden' : ''
    }
  }
})