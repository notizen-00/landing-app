<template>
   
    <div class="text-center items-center text-h4 relative pb-10 pt-10 pl-10">
        <span class="font-serif pb-4"> -- List Berita -- </span> 
        <v-divider
        :thickness="5"
        class="border-opacity-100 absolute border-3 right-1/4  w-1/2 mt-4 border-yellow-400"
        color="warning"
        ></v-divider>
     </div>

     <v-container>
      
      <div class="w-full d-flex"  v-for="(blog, index) in ListBlogs" :key="index" style="float:left">
      <v-card class="w-8/12 ml-48 mt-3">
        <div class="d-flex justify-start"> 
          <img
        height="150"

        src="/img/thumbnail.avif"
        />
        <div class="items-center h-full justify-center mt-20 ml-3 text-h5">
          {{ blog.judul }}<br>
          <span class="text-sm"><v-icon>mdi-calendar</v-icon> {{ blog.created_at }}</span>
        </div>
      
        </div>
        
       </v-card>
       <v-card class="h-full w-1/2 absolute right-0" style="float-right">
        <v-card-title>Berita Terpopuler</v-card-title>
        <v-list>
          <v-list-item>
          
          </v-list-item>
        </v-list>
       </v-card>
      </div>
     
     
    
      
     </v-container>
   
    <v-card
    class="mt-4"
    height="500"
    v-if="ListBlogs.length <= 0">
        <v-img
        class="align-center mt-40 items-center justify-center text-white"
        height="300"
        src="/img/produk_kosong.png"
        
      >
        <v-card-title class="text-black text-center">Blog Kosong</v-card-title>
      </v-img>
  

    </v-card>

</template>
<script setup>  

import { storeToRefs } from 'pinia';
import {inject,ref,onMounted} from 'vue'
import { Link } from '@inertiajs/vue3';

const store = inject('store')
const { ListBlogs } = storeToRefs(store.blogSiteStore)

onMounted(()=>{
  store.blogSiteStore.fetchBerita();
})

const selection  = ref(0);
const loading = ref(false);


</script>