// src/store/modules/index.js
import { useOverlayStores } from './overlay'
import { useAccountStateStore } from './AccountState'
import { useNavigationStateStore } from './NavigationState' 
import { useProdukStore } from './ProdukStore'
import { useMitraStore } from './MitraStore'
// Impor modul-modul lain jika ada

export function useStore() {
  return {
    overlay: useOverlayStores(),
    AccountState: useAccountStateStore(),
    NavigationState: useNavigationStateStore(),
    produkStore: useProdukStore(),
    mitraStore: useMitraStore()
    // Masukkan modul-modul lain di sini jika ada
  }
}
