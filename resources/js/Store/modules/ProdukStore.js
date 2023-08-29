// src/store/modules/overlay.js
import axios from 'axios'
import { defineStore } from 'pinia'

export const useProdukStore = defineStore('produkStore', {

  state: () => ({
    produk: null,
    
  }),
  actions: {

    async fetchProduk(MitraId){
        try{
            const url = window.location.origin;
            const response = await axios.get(url+'/api/produk/mitra/'+MitraId);
            this.produk = response.data;

        }catch(error){


        }
    }
   
  },
  getters: {
        getProduk:(state) => state.produk
  
  },
  persist:true
})
