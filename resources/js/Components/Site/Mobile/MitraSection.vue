<template>
    <v-sheet
      class="w-full"
      color="grey-lighten-3"
      elevation="1"
      rounded="xl"
      
    >

        <!-- <div class="mt-2"> -->
        <v-text-field v-model="search" append-inner-icon="mdi-store-search-outline" density="compact" variant="solo" class="mt-2" rounded="xl"  label="Cari Mitra" dense outlined></v-text-field>
      <!-- </div> -->
      <v-slide-group
        v-model="model"
        class="w-full"
        center-active
        :show-arrows="false"
      >
        <v-slide-group-item
          v-for="( value,index ) in filteredMitra"
          :key="index"
          v-slot="{ isSelected, toggle }"
        >
          <v-card
            :color="isSelected ? 'blue-lighten-5 ' : 'white'"
            class="m-2 relative"
            height="350"
            width="300"
            @click="toggle"
          >
          <v-img
          src="/img/store-banner.png"
          height="130px"
         
        ></v-img>
        <v-divider :thickness="5" class="border-yellow-200 border-opacity-100"></v-divider>
        <v-card-item>
            <v-card-title>{{ value.nama_usaha }}</v-card-title>
      
            <v-card-subtitle>
              <v-chip size="small" variant="outlined" prepend-icon="mdi-fire-circle" class="text-slate-800" color-icon="red" color="default">
                  <template v-slot:prepend>
                    <v-icon color="red"></v-icon>
                  </template>
                {{ value.program.nama_program }}
              </v-chip>  
              
              <br>
              <v-chip size="small" variant="text" prepend-icon="mdi-sign-real-estate" class="text-slate-300" color="danger">
                <template v-slot:prepend>
                    <v-icon color="warning"></v-icon>
                  </template>
                {{ value.nama_kecamatan }}
              </v-chip><br>
            
            </v-card-subtitle>
          </v-card-item>
          <div class="text-subtitle-3 ml-3 -mb-1 -mt-5">
             <v-chip size="small" variant="text" prepend-icon="mdi-map-marker" class="text-slate-300" color="danger">
                <template v-slot:prepend>
                    <v-icon color="success"></v-icon>
                  </template>
                {{ value.alamat_usaha }}
              </v-chip>
          </div>
            <v-card-text class="text-start text-slate-600 line-clamp-1">
               
                {{ value.deskripsi_usaha ? value.deskripsi_usaha : 'Mitra Belum Mengupdate deskripsi ...' }}
                
             </v-card-text>
             <v-card-actions class="d-flex justify-center absolute bottom-2 left-1/4">
                <v-btn
                variant="tonal"
                class="text-white"
                v-if="isSelected"
                append-icon="mdi-eye"
                @click.prevent="routeDetail(value.id)"
                color="warning"
              >
                Lihat Detail
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
    const { getListMitra } = storeToRefs(store.siteStore)

    const filteredMitra = computed(() =>
    getListMitra.value.filter((mitra) =>
    mitra.nama_usaha.toLowerCase().includes(search.value.toLowerCase())
    )
    );

    const routeDetail = (id) =>{
        store.siteStore.fetchDetailMitra(id)
        store.produkSiteStore.fetchProduk(id)
        router.get('site/mitra/'+id)
    }

    
       

  </script>