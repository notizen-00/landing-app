// src/store/modules/index.js
import { useOverlayStores } from './overlay'
import { useAccountStateStore } from './AccountState'
import { useNavigationStateStore } from './NavigationState' 
import { useProdukStore } from './ProdukStore'
import { useMitraStore } from './MitraStore'
import { useKecamatanStore } from './KecamatanStore'
import { useSiteStore } from './SiteStore'
import { useTokoStore } from './TokoStore'
import { useProdukSiteStore } from './ProdukSiteStore'
// Impor modul-modul lain jika ada

export function useStore() {
  return {
    overlay: useOverlayStores(),
    AccountState: useAccountStateStore(),
    NavigationState: useNavigationStateStore(),
    produkStore: useProdukStore(),
    mitraStore: useMitraStore(),
    kecamatanStore: useKecamatanStore(),
    siteStore: useSiteStore(),
    tokoStore: useTokoStore(),
    produkSiteStore:useProdukSiteStore()
    // Masukkan modul-modul lain di sini jika ada
  }
}
