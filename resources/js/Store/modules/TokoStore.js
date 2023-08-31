import axios from 'axios'
import { defineStore } from 'pinia'
import { useMitraStore } from './MitraStore' 

export const useTokoStore = defineStore('tokoStore', {
    state: () => ({
      detailMitra:null,
      loading:false,
      dialog:false

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
      }
    },
    getters: {
      getDetailMitra: (state) => state.detailMitra,
      getDialog:(state)=> state.dialog
      
    }

  })