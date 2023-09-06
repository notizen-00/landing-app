<template>
   
    <div class="text-center items-center text-h4 relative pb-10 pt-10 pl-10">
        <span class="font-serif pb-4"> -- List Berita -- </span> 
        <v-divider
        :thickness="5"
        class="border-opacity-100 absolute border-3 right-1/4  w-1/2 mt-4 border-yellow-400"
        color="warning"
        ></v-divider>
     </div>
    <v-carousel
    v-if="ListBlogs.length > 0"
    class="mt-3 mb-10 rounded-t-xl"
    show-arrows="hover"
    height="600"
    hide-delimiters
    progress="primary"
    v-model="selection"
    >
    <v-carousel-item
    v-for="(blog, index) in ListBlogs ? ListBlogs : []" :key="`card-${index}`" :value="index"
    >
    
    <v-card
    :loading="loading"
    class="mx-auto h-full w-full rounded-t-xl border-t-xl border-2 border-yellow-500 relative z-10"
    >
    
    <v-card-item>
      <v-img
      cover
      height="250"
      max-width="500"
      class="m-5 mx-auto"
      src="/img/thumbnail.avif"
    >
    </v-img>
      <!-- <v-card-title class="w-full whitespace-normal"> -->
        <div class="w-full mb-16 line-clamp-3">
          <h1 class="text-h6"><b> {{ blog.judul }}</b></h1> 
        </div>
      <!-- </v-card-title> -->
    
    <v-card-subtitle class="d-flex justify-between">
      <div>
        <span class="me-1">{{ blog.author }} </span>
  
        <v-icon
          color="error"
          icon="mdi-account"
          size="small"
        ></v-icon>
      </div>
      <div>
        <span class="me-1">{{ blog.created_at }} </span>
        <v-icon
        color="info"
        icon="mdi-calendar-clock"
        size="small"
      ></v-icon>
      </div>
    
    
      
      </v-card-subtitle>
    </v-card-item>
    
    <v-card-text>
      <v-row
        align="center"
        class="mx-0"
      >
        <div class="text-black ms-1 pb-2">
       
        </div>
      </v-row>
    
      <div class="my-4 text-slate-600 text-subtitle-1 line-clamp-2">
        {{ blog.deskripsi }}
      </div>
    
      <div class="text-center"><Link :href="route('site_berita.show',{id:blog.id})"><v-btn variant="outlined" color="blue">Baca Selengkapnya</v-btn></Link></div>
    </v-card-text>
    
    <v-divider class="mx-4 mb-10"></v-divider>
    </v-card>

    </v-carousel-item>
    </v-carousel>
    

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