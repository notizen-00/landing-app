// src/store/modules/overlay.js
import { defineStore } from 'pinia'

export const useNavigationStateStore = defineStore('NavigationState', {
  state: () => ({
    link: ''
  }),
  actions: {
    getLink() {
      this.overlay = !this.overlay
    }
  },
  getters: {
    isLinkActive() {
      return this.link
    }
  }
})
