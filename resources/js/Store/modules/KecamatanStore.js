
// src/store/modules/overlay.js
import axios from 'axios';
import { defineStore } from 'pinia'



export const useKecamatanStore = defineStore('kecamatanStore', {
  state: () => ({
    listKecamatan: []
  }),
  actions: {
    async fetchKecamatan() {
        const endpoint = window.location.origin;

        try {
            this.listKecamatan = await fetch(endpoint+'/api/kecamatan')
            .then((response) => response.json())

          } catch (error) {
            console.log(error)
          } finally {
            console.log('done')
          }
        // console.log(response.data)
        // this.listKecamatan = response.data
    }
  },
  getters: {
    getListKecamatan(state) {
        return state.listKecamatan // Menggunakan storeToRef di sini
      }
  }
})
