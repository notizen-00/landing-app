import axios from 'axios'
import { defineStore } from 'pinia'


export const useBlogStore = defineStore('blogStore', {
    state: () => ({
      listBlog: null,
      topBar:'dashboard'
    }),
    actions: {
      setMitraId(id) {
        this.mitraId = id;
        
      },
      async fetchBerita(){
            const response = await axios.get(window.location.origin+'/api/berita');

            this.listBlog = response.data;
      },
      setTopBar(value){
          this.topBar = value;
      }
    },
    getters: {
      ListBlogs: (state) => state.listBlog,
      getTopBar: (state) => state.topBar
    }
  })