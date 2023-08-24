// src/store/modules/index.js
import { useOverlayStores } from './overlay'
import { useAccountStateStore } from './AccountState'
import { useNavigationStateStore } from './NavigationState' 
// Impor modul-modul lain jika ada

export function useStore() {
  return {
    overlay: useOverlayStores(),
    AccountState: useAccountStateStore(),
    NavigationState: useNavigationStateStore()
    // Masukkan modul-modul lain di sini jika ada
  }
}
