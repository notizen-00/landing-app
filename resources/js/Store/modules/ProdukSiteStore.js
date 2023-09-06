// src/store/modules/overlay.js
import axios from 'axios'
import { defineStore } from 'pinia'
import { api_helper } from '@/Service/FetchHelper'
export const useProdukSiteStore = defineStore('produkSiteStore', {

  state: () => ({
    produk: [],
    detailProduk: [],
    
  }),
  actions: {

    async fetchProduk(MitraId){
        try{
            const url = window.location.origin;
            const response = await api_helper.get(url+'/api/public/produk/mitra/'+MitraId);
           
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
        getDetailProduk:(state) => state.detailProduk,
        getTotalProduk: (state) => {
          return state.produk ? state.produk.length : 0;
        },
  
  },
  persist:true
})
