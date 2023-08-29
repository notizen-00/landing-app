<template>

<v-carousel
class="mt-3 rounded-t-xl"
show-arrows="hover"
hide-delimiters
progress="primary"
v-model="selection"
>
<v-carousel-item
v-for="(product, index) in produk" :key="`card-${index}`" :value="index"
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
    class="align-end justify-center"
  >
  
    <v-btn variant="outlined" @click.prevent="editProduk(product.id)" icon="mdi-pencil" color="success" class="mr-2"></v-btn>
    <v-btn variant="outlined" @click.prevent="deleteProduk(product.id)" icon="mdi-delete" color="red"></v-btn>
    <v-btn variant="outlined" @click.prevent="archiveProduk(product.id)" icon="mdi-archive-outline" class="ml-2" color="info"></v-btn>
   
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

<v-divider class="mx-4 mb-1"></v-divider>
</v-card>
</v-carousel-item>
</v-carousel>



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

  const deleteProduk = (ProdukId) =>{
      store.produkStore.deleteProduk(ProdukId)
  } 

  const editProduk = async(ProdukId) =>{

       store.overlay.toggleEditProduct();
      await store.produkStore.fetchDetailProduk(ProdukId);

  }

  const archiveProduk = (ProdukId) =>{

  }

  

  const formatRupiah = (number) => {
  return new Intl.NumberFormat('id-ID', {
    style: 'currency',
    currency: 'IDR'
  }).format(number);
};

 
  
  const loading = ref(false);
  const selection = ref(0);
  const onboarding = ref(0);


  const reserve = () =>{
     loading.value = !loading.value
     setTimeout(() => (loading.value = !loading.value),2000)  
  }

</script>