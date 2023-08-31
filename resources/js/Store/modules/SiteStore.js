import axios from 'axios'
import { defineStore } from 'pinia'
import { api_helper } from '@/Service/FetchHelper'
export const useSiteStore = defineStore('siteStore', {
    state: () => ({
      selectedFilter: 'kecamatan',
      listMitra:[],
      searchQuery: '',
      detailMitra:[],
      mitraId:0
    }),
    actions: {
      setFilter(filter) {
        this.selectedFilter = filter;
      },
      setMitraId(value){
          this.mitraId = value;
      },
      async fetchMitra(){

          const response = await api_helper.get('/api/public/mitra');
          this.listMitra = response.data || []
      },
      async fetchDetailMitra(id){
  
          const response = await api_helper.get('/api/public/mitra/'+id);
          this.detailMitra = response.data || []
        
      }
    },
    getters: {
      getSelectedFilter: (state) => state.selectedFilter,
      getListMitra: (state) => state.listMitra,
      getDetailMitra:(state) => state.detailMitra
    }
  })