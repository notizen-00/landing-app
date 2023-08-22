// src/store/pinia.js
import { createPinia } from 'pinia'

export const pinia = createPinia()

export function useStore(storeName) {
  return pinia.useStore(storeName)
}
