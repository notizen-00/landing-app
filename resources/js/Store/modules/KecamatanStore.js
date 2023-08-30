// src/store/modules/overlay.js
import axios from 'axios';
import { defineStore } from 'pinia'

export const useKecamatanStore = defineStore('kecamatanStore', {
  state: () => ({
    listKecamatan: []
  }),
  actions: {
    async fetchKecamatan() {
      const apiKey = '415cc2b6174d7b09feeb6315f0456495'; // Ganti dengan API Key yang sesuai
      const endpoint = window.location.origin; // Ganti dengan URL endpoint yang sesuai

      try {
        const response = await axios.get(endpoint+'/api/kecamatan', {
          headers: {
            'X-API-Public-Key': apiKey,
          },
        });
        
        this.listKecamatan = response.data;
      } catch (error) {
        console.error(error);
      } finally {
        console.log('done');
      }
    }
  },
  getters: {
    getListKecamatan(state) {
      return state.listKecamatan;
    }
  }
});
