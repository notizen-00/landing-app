<template>
    <div class="" ref="target_produk">
        <v-carousel
        v-if="getProduk[0].produk.length > 0"
        class="mt-3 mb-10 rounded-t-xl"
        show-arrows="hover"
        hide-delimiters
        progress="primary"
        v-model="selection"
        >
        <v-carousel-item
        v-for="(product, index) in getProduk[0].produk" :key="`card-${index}`" :value="index"
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
          :src="'/storage/foto_produk/'+product.foto_produk"
        >
        <v-overlay
            :model-value="isHovering"
            contained
            scrim="white"
            class="align-end bg-white justify-center"
          >
          
            <v-btn variant="outlined" @click.prevent="hubungiMitra(getDetailMitra.users.no_hp,product.nama_produk)" append-icon="mdi-whatsapp" color="success" class="mr-2">Hubungi Mitra</v-btn>
           
          </v-overlay>
        </v-img>
        </v-hover>
        
        <v-card-item>
          <v-card-title>{{ product.nama_produk }}</v-card-title>
        
          <v-card-subtitle>
            <span class="me-1">{{ product.stok_produk }} Stok Tersedia</span>
        
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
              {{ formatRupiah(product.harga_produk) }}
            </div>
          </v-row>
        
          <div class="my-4 text-subtitle-1">
           <v-icon color="blue" class="rounded-xl p-5">mdi-store</v-icon> KendoKenceng Store
          </div>
        
          <div>{{ product.deskripsi_produk }}</div>
        </v-card-text>
        
        <v-divider class="mx-4 mb-10"></v-divider>
        </v-card>
        </v-carousel-item>
        </v-carousel>
        
        </div>
        <v-card
        class="mt-4"
        height="500"
        v-if="getProduk[0].produk.length <= 0">
            <v-img
            class="align-center mt-40 items-center justify-center text-white"
            height="200"
            src="/img/produk_kosong.png"
            
          >
            <v-card-title class="text-black text-center">Mitra Ini Tidak Memiliki Produk</v-card-title>
          </v-img>
      

        </v-card>

</template>
<script setup>  

    import { storeToRefs } from 'pinia';
import {inject,ref} from 'vue'

    const store = inject('store')
    const { getProduk } = storeToRefs(store.produkSiteStore)
    const { getDetailMitra }  = storeToRefs(store.siteStore)

    const selection  = ref(0);
    const loading = ref(false);
    const formatRupiah = (number) => {
  return new Intl.NumberFormat('id-ID', {
    style: 'currency',
    currency: 'IDR'
  }).format(number);
};
const hubungiMitra = (no_hp,nama_produk) => {
   
    const nomorHP = no_hp.replace(/^0/, '62');
    
    console.log(nomorHP);
    
    
    const teksTambahan = "Apakah produk "+ nama_produk +" masih ada?";
    

    const whatsappURL = `https://wa.me/${nomorHP}?text=${encodeURIComponent(teksTambahan)}`;

    window.location.href = whatsappURL;
}



</script>