// src/store/modules/overlay.js
import { defineStore } from 'pinia'

export const useOverlayStores = defineStore('overlay', {
  state: () => ({
    overlay: false,
    overlayProduct: false,
  }),
  actions: {
    toggleOverlay() {
      this.overlay = !this.overlay
    },
    toggleOverlayProduct() {
      this.overlayProduct = !this.overlayProduct
    }
  },
  getters: {
    isOverlayActive() {
      return this.overlay
    },
    isOverlayProductActive() {
      return this.overlayProduct
    }
  }
})
