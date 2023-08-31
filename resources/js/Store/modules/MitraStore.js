import axios from 'axios'
import { defineStore } from 'pinia'


export const useMitraStore = defineStore('mitraStore', {
    state: () => ({
      mitraId: null,
      topBar:'dashboard'
    }),
    actions: {
      setMitraId(id) {
        this.mitraId = id;
        
      },
      setTopBar(value){
          this.topBar = value;
      }
    },
    getters: {
      getMitraId: (state) => state.mitraId,
      getTopBar: (state) => state.topBar
    },
    persist: {
      enabled: true,
 
      include: ['mitraId']
    }
  })