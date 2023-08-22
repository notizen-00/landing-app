// src/store/modules/overlay.js
import { defineStore } from 'pinia'

export const useOverlayStores = defineStore('overlay', {
  state: () => ({
    overlay: false
  }),
  actions: {
    toggleOverlay() {
      this.overlay = !this.overlay
    }
  },
  getters: {
    isOverlayActive() {
      return this.overlay
    }
  }
})
