import axios from 'axios'
import { defineStore } from 'pinia'
import { api_helper } from '@/Service/FetchHelper'
export const useProgramStore = defineStore('programStore', {
    state: () => ({
      selectedFilter: 'kecamatan',
      listProgram:[],
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
      async fetchProgram(){

          const response = await api_helper.get('/api/public/program');
          this.listProgram = response.data || []
      },
      async fetchDetailMitra(id){
  
          const response = await api_helper.get('/api/public/mitra/'+id);
          this.detailMitra = response.data || []
        
      }
    },
    getters: {
      getSelectedFilter: (state) => state.selectedFilter,
      ListProgram: (state) => state.listProgram,
      getDetailMitra:(state) => state.detailMitra
    },
    persist:true
  })