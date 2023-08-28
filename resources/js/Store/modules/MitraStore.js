import axios from 'axios'
import { defineStore } from 'pinia'


export const useMitraStore = defineStore('mitraStore', {
    state: () => ({
      mitraId: null,
    }),
    actions: {
      setMitraId(id) {
        this.mitraId = id;
      },
    },
    getters: {
      getMitraId: (state) => state.mitraId,
    },
  })