<template>
    <v-bottom-navigation
      v-model="tabs"
      bg-color="blue"
      mode="shift"
      
      class="d-flex d-sm-none rounded-lg"
    >
      <Link :href="route('dashboard')"  class="text-small">
        <v-btn>
          <v-icon>mdi-view-dashboard-outline</v-icon>
          <span>Dashboard</span>
        </v-btn>
      </Link>
  
      <Link :href="route('dashboard')" class="text-small w-full">
        <v-btn>
          <v-icon>mdi-image-area</v-icon>
          <span>Gallery</span>
        </v-btn>
      </Link>
  
      <Link :href="route('mitra_toko.index')" class="text-small w-full">
        <v-btn>
          <v-icon>mdi-store-outline</v-icon>
          <span>Toko</span>
        </v-btn>
      </Link>
  
      <Link :href="route('dashboard')" class="text-small w-full">
        <v-btn>
          <v-icon>mdi-account</v-icon>
          <span>Account</span>
        </v-btn>
      </Link>
    </v-bottom-navigation>
  </template>
  
  <script setup>
  import { computed, ref, inject } from 'vue'
  import { Link, usePage } from '@inertiajs/vue3'

  const tabs = ref(0);
  const page = usePage();


  if(page.url === '/mitra-app/mitra_toko'){
    tabs.value=2;
  }


  
  
 

  </script>
  