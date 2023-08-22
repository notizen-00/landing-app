// src/store/modules/index.js
import { useOverlayStores } from './overlay'
// Impor modul-modul lain jika ada

export function useStore() {
  return {
    overlay: useOverlayStores(),
    // Masukkan modul-modul lain di sini jika ada
  }
}
