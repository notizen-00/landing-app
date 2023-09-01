<template>
        <v-card
        class="mx-auto rounded-t-xl rounded-b-lg mt-1"
        max-width="100%"
      >
        <v-img
          class="align-end mt-2 ml-4 mr-4 text-white"
          height="250"
          src="/img/store-banner.png"
          cover
        >
          <v-card-title class="text-center text-black bg-grey-lighten-3 rounded-xl">{{ getDetailMitra.nama_usaha }}
                <v-icon size="xs" color="green">mdi-check-circle</v-icon>
            <v-divider
            inset
            :thickness="5"
            class="border-opacity-100 border-3 mx-auto border-yellow-400"
            color="warning"
            ></v-divider></v-card-title>
        </v-img>
      </v-card>

</template>
<script setup>
import { inject } from 'vue'
import {storeToRefs} from 'pinia'
const store = inject('store') 
const { getDetailMitra } = storeToRefs(store.siteStore)
   

</script>