import { api_helper } from '@/Service/FetchHelper';
import axios from 'axios'
import { defineStore } from 'pinia'

export const useBlogSiteStore = defineStore('blogSiteStore', {
    state: () => ({
      listBlog: null,
      topBar:'dashboard'
    }),
    actions: {
      setMitraId(id) {
        this.mitraId = id;
        
      },
      async fetchBerita(){

            const response = await api_helper.get(window.location.origin+'/api/public/berita');
            console.log(response.data)
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