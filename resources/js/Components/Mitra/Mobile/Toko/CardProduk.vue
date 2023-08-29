<template>

  
  <v-window
  class="mt-10 z-10 relative"
  show-arrows="hover"
  v-if="produk.length > 0"
  >

  <v-window-item
 
  v-for="(product, index) in produk" :key="`card-${index}`"
  
  >

    <v-card
      :loading="loading"
      class="mx-auto h-full w-full rounded-t-xl border-t-xl border-2 border-yellow-500 relative z-10"
    >
   
        <v-btn 
        color="blue"
        class="absolute w-full z-50 -mt-7 left-30 top-4"
        icon="mdi-variant-plus"
        >

        </v-btn>
      <template v-slot:loader="{ isActive }">
        <v-progress-linear
          :active="isActive"
          color="deep-purple"
          height="4"
          indeterminate
        ></v-progress-linear>
      </template>
  
      <v-img
        cover
        height="250"
        class="m-5"
        :src="'/storage/foto_produk/'+product.foto_produk"
      ></v-img>
  
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
          KendoKenceng Store
        </div>
  
        <div>{{ product.deskripsi_produk }}</div>
      </v-card-text>
  
      <v-divider class="mx-4 mb-1"></v-divider>
    </v-card>

  </v-window-item>
</v-window>

<v-badge v-if="produk.length < 0" ></v-badge>
  </template>

  <script setup>
  import { ref,inject,onMounted,computed,watch } from 'vue';
  import { usePage } from '@inertiajs/vue3'

  const store = inject('store')
  const page = usePage()
  const produk = ref([])
  onMounted( async()=>{
    const MitraId = page.props.mitra_id;
  
   await store.produkStore.fetchProduk(MitraId)

  })
  
  const produkStore = computed(() => store.produkStore.getProduk); 
watch(produkStore, (newProduk, oldProduk) => {
  
  produk.value = newProduk
});


  

  const formatRupiah = (number) => {
  return new Intl.NumberFormat('id-ID', {
    style: 'currency',
    currency: 'IDR'
  }).format(number);
};

 
  
  const loading = ref(false);
  const selection = ref(1);
  const onboarding = ref(0);


  const reserve = () =>{
     loading.value = !loading.value
     setTimeout(() => (loading.value = !loading.value),2000)  
  }

</script>