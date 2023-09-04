import axios from 'axios'
import { defineStore } from 'pinia'
import { useMitraStore } from './MitraStore' 

export const useTokoStore = defineStore('tokoStore', {
    state: () => ({
      detailMitra:null,
      loading:false,
      dialog:false,
      target_produk:null,

    }),
    actions: {
     async fetchDetailMitra(){
            const mitraStore = useMitraStore()
            const mitraId = mitraStore.mitraId

            const response = await axios.get(window.location.origin + "/api/mitra/" + mitraId)

            this.detailMitra = response.data || []

      },
      toggleDialog(){
            return this.dialog = !this.dialog
      },
      setTargetProduk(target) {
        return this.target_produk = target;
      }
    },
    getters: {
      getTargetProduk:(state)=>state.target_produk,
      getDetailMitra: (state) => state.detailMitra,
      getDialog:(state)=> state.dialog
      
    },
    persist:'sessionStorage'

  })