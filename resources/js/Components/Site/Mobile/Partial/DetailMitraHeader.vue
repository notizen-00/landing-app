<template>
        <v-card
        color="black"
        class="mx-auto d-flex d-sm-none rounded-t-xl rounded-b-lg mt-1"
        max-width="100%"
      >
        <v-img
          class="align-end mt-2 ml-4 mr-4 text-white"
          height="250"
          src="/img/store-banner.png"
          cover
        >
          <!-- <v-card-title class="text-center text-black bg-grey-lighten-3 rounded-xl">{{ getDetailMitra.nama_usaha }}
                <v-icon size="xs" color="green">mdi-check-circle</v-icon>
            <v-divider
            inset
            :thickness="5"
            class="border-opacity-100 border-3 mx-auto border-yellow-400"
            color="warning"
            ></v-divider></v-card-title> -->
            <div class="text-center text-sm w-full text-uppercase text-white backdrop-opacity-30 backdrop-invert bg-black/10 d-flex justify-between">
              <div class="m-2" >
               {{ getDetailMitra.nama_kecamatan }}
                
              </div>
              <div class="m-2">
  
                <span class="text-sm text-uppercase">{{ getDetailMitra.nama_usaha }} <v-icon size="sm" color="green" class="-mt-1">mdi-check-circle</v-icon>  </span> 
  
              </div>
  
          </div>
        </v-img>
      </v-card>

      <v-card
      color="black"
      class="mx-auto d-none d-sm-flex bg-blue-700 rounded-t-xl rounded-b-lg mt-1"
      max-width="100%"
    >
      <v-img
        class="align-end mx-auto text-white"
        height="760"
        max-width="100%"
        src="/img/store-banner.png"
        cover
      >
        <div class="text-center text-h4 text-uppercase text-white backdrop-opacity-20 backdrop-invert bg-black/10 d-flex justify-between">
            <div class="m-10" >
             {{ getDetailMitra.nama_kecamatan }}
              
            </div>
            <div class="m-10">
              <span class="text-h4 text-uppercase">{{ getDetailMitra.nama_usaha }}  <v-icon size="sm" color="green" class="-mt-1">mdi-check-circle</v-icon> </span>

            </div>

        </div>
      </v-img>
    </v-card>

</template>
<script setup>
import { inject } from 'vue'
import {storeToRefs} from 'pinia'
const store = inject('store') 
const { getDetailMitra } = storeToRefs(store.siteStore)
   

</script>