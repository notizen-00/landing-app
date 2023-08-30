import axios from 'axios'
import { defineStore } from 'pinia'
import { api_helper } from '@/Service/FetchHelper'
export const useSiteStore = defineStore('siteStore', {
    state: () => ({
      selectedFilter: 'kecamatan',
      listMitra:[],
      searchQuery: '',
    }),
    actions: {
      setFilter(filter) {
        this.selectedFilter = filter;
      },
      async fetchMitra(){

          const response = await api_helper.get('/api/public/mitra');
          this.listMitra = response.data || []
      }
    },
    getters: {
      getSelectedFilter: (state) => state.selectedFilter,
      getListMitra: (state) => state.listMitra,
      getFilteredMitra(state){

      
        // return this.listMitra.filter(mitra => mitra.nama_usaha.toLowerCase().includes(searchTerm));
      },
    }
  })