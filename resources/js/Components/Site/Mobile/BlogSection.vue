<template>
    <div class="" ref="target_blog">
        <v-carousel
        v-if="ListBlogs.length > 0"
        class="mt-3 mb-10 rounded-t-xl"
        show-arrows="hover"
        hide-delimiters
        progress="primary"
        v-model="selection"
        >
        <v-carousel-item
        v-for="(blog, index) in ListBlogs" :key="`card-${index}`" :value="index"
        >
        
        <v-card
        :loading="loading"
        class="mx-auto h-full w-full rounded-t-xl border-t-xl border-2 border-yellow-500 relative z-10"
        
        >
        
        <template v-slot:loader="{ isActive }">
          <v-progress-linear
            :active="isActive"
            color="deep-purple"
            height="4"
            indeterminate
          ></v-progress-linear>
        </template>
        <v-hover v-slot="{ isHovering, props }">
        <v-img
          cover
          v-bind="props"
          height="250"
          class="m-5"
          :src="'/storage/thumbnail/'+blog.foto_berita"
        >
        <v-overlay
            :model-value="isHovering"
            contained
            scrim="white"
            class="align-end bg-white justify-center"
          >
          
            <v-btn variant="outlined" @click.prevent="lihatDetail(blog.id)" append-icon="mdi-account" color="success" class="mr-2">Lihat Detail</v-btn>
           
          </v-overlay>
        </v-img>
        </v-hover>
        
        <v-card-item>
          <v-card-title>{{ blog.judul }}</v-card-title>
        
          <v-card-subtitle>
            <span class="me-1">{{ blog.author }} Stok Tersedia</span>
        
            <v-icon
              color="error"
              icon="mdi-fire-circle"
              size="small"
            ></v-icon>
          </v-card-subtitle>
        </v-card-item>
        
        <v-card-text>
          <v-row
            align="center"
            class="mx-0"
          >
        
        
            <div class="text-black ms-1 pb-2">
              H
            </div>
          </v-row>
        
          <div class="my-4 text-subtitle-1">
           <v-icon color="blue" class="rounded-xl p-5">mdi-store</v-icon> KendoKenceng Store
          </div>
        
          <div>{{ blog.deskripsi }}</div>
        </v-card-text>
        
        <v-divider class="mx-4 mb-10"></v-divider>
        </v-card>
        </v-carousel-item>
        </v-carousel>
        
        </div>
        <v-card
        class="mt-4"
        height="500"
        v-if="ListBlogs.length <= 0">
            <v-img
            class="align-center mt-40 items-center justify-center text-white"
            height="200"
            src="/img/produk_kosong.png"
            
          >
            <v-card-title class="text-black text-center">Blog Kosong</v-card-title>
          </v-img>
      

        </v-card>

</template>
<script setup>  

    import { storeToRefs } from 'pinia';
    import {inject,ref} from 'vue'

    const store = inject('store')
    const { ListBlogs } = storeToRefs(store.blogSiteStore)
  
    store.blogSiteStore.fetchBerita();
    const selection  = ref(0);
    const loading = ref(false);

    const lihatDetail = (id) =>{
        alert(id)
    }




</script>