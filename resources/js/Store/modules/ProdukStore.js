// src/store/modules/overlay.js
import axios from 'axios'
import { defineStore } from 'pinia'

export const useProdukStore = defineStore('produkStore', {

  state: () => ({
    produk: null,
    detailProduk: null,
    
  }),
  actions: {

    async fetchProduk(MitraId){
        try{
            const url = window.location.origin;
            const response = await axios.get(url+'/api/produk/mitra/'+MitraId);
            this.produk = response.data;

        }catch(error){
          console.log(error)

        }
    },
    async fetchDetailProduk(ProdukId){
      try{
        const url = window.location.origin;
        const response = await axios.get(url+'/api/produk/'+ProdukId);
        this.detailProduk = response.data;

      }catch(error){
        console.log(error);
      }
     
    },
    resetDetailProduk() {
      this.detailProduk = null;
     }
   
  },
  getters: {
        getProduk:(state) => state.produk,
        getDetailProduk:(state) => state.detailProduk
  
  }
})
