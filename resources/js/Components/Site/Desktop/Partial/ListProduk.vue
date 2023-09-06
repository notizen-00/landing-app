<template>
    <v-sheet
    class="w-full"
    color="grey-lighten-3"
    elevation="1"
    rounded="xl"
    
  >

    <v-text-field v-model="search" append-inner-icon="mdi-store-search-outline" density="compact" variant="solo" class="mt-2 w-1/2 mx-auto" rounded="xl"  label="Cari Produk" dense outlined></v-text-field>

    <v-slide-group
      v-model="model"
      class="w-full"
      center-active
      :show-arrows="false"
    >
      <v-slide-group-item
        v-for="( value,index ) in filteredProduk"
        :key="index"
        v-slot="{ isSelected, toggle }"
      >
        <v-card
          :color="isSelected ? 'blue-lighten-5 ' : 'white'"
          class="m-2 relative"
          height="450"
          width="400"
          @click="toggle"
        >
        <v-img
        :src="'/storage/foto_produk/'+value.foto_produk"
        height="230px"
       
      ></v-img>
      <v-divider :thickness="5" class="border-yellow-200 border-opacity-100"></v-divider>
      <v-card-item>
          <v-card-title>{{ value.nama_produk }}</v-card-title>
    
          <v-card-subtitle>
            <v-chip size="large" variant="" prepend-icon="mdi-fire-circle" class="text-slate-800" color-icon="red" color="default">
                <template v-slot:prepend>
                  <v-icon color="red"></v-icon>
                </template>
              {{ value.stok_produk }} Stok Tersedia
            </v-chip>  
            
            <br>
        
          
          </v-card-subtitle>
        </v-card-item>
        <div class="text-subtitle-3 -ml-8 -mb-1 -mt-1">
           <v-chip size="large" variant="text" class="text-slate-300" color="danger">
              <template v-slot:prepend>
                  <v-icon color="success"></v-icon>
                </template>
              {{ formatRupiah(value.harga_produk) }}
            </v-chip>
        </div>
          <v-card-text class="text-center text-lg text-h6 text-slate-600 line-clamp-1">
             
              {{ value.deskripsi_produk ? value.deskripsi_produk : 'Mitra Belum Mengupdate deskripsi ...' }}
              
           </v-card-text>
           <v-card-actions class="d-flex justify-center absolute bottom-2 left-1/4">
              <v-btn
              variant="tonal"
              class="text-white"
              v-if="isSelected"
              append-icon="mdi-whatsapp"
              @click.prevent="routeDetail(value.id)"
              color="success"
            >
              Hubungi Mitra
            </v-btn>  

           </v-card-actions>
          
        </v-card>
      </v-slide-group-item>
    </v-slide-group>

  </v-sheet>
</template>
<script setup>

import { storeToRefs } from 'pinia';
    import { ref,inject,computed } from 'vue'
    import { router } from '@inertiajs/vue3'
    const model = ref(null)
    const store = inject('store')
    const search = ref('')
    const overlay = ref(true)

    const { getProduk } = storeToRefs(store.produkSiteStore)
    const { getDetailMitra }  = storeToRefs(store.siteStore)

    const { getListMitra } = storeToRefs(store.siteStore)
    
    const formatRupiah = (number) => {
  return new Intl.NumberFormat('id-ID', {
    style: 'currency',
    currency: 'IDR'
  }).format(number);
};
    const filteredProduk = computed(() =>
    getProduk.value[0].produk.filter((mitra) =>
    mitra.nama_produk.toLowerCase().includes(search.value.toLowerCase())
    )
    );

    const routeDetail = (id) =>{
        store.siteStore.fetchDetailMitra(id)
        store.produkSiteStore.fetchProduk(id)
        router.get('site/mitra/'+id)
    }


</script>