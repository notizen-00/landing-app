<template>
    <div class="d-none d-sm-flex w-full">
      <div class="mr-auto justify-start"><v-avatar image="/img/logo.png" size="50" class="m-2" color="blue" ></v-avatar></div>
  
      <div class="m-3">
        <Link :href="route('site')">
        <v-btn class="hover:divide-x-4" variant="plain">
          Beranda
        </v-btn>
        </Link>
        <!-- <v-btn class="hover:divide-x-4" variant="plain">Program</v-btn> -->

        <v-btn
        text
        variant="plain"
        class="hover:divide-x-4" 
      >
   
       <span> Program <v-icon right>mdi-menu-down</v-icon></span>
 
       <!-- <span >Program</span> -->
  
        <v-menu activator="parent">
          <v-list>
            <v-list-item
              v-for="(item, index) in listProgram"
              :key="index"
              :value="index"
            >
              <v-list-item-title><Link :href="route('site_program.show',{id:item.id})">{{ item.nama_program }}</Link></v-list-item-title>
            </v-list-item>
          </v-list>
        </v-menu>
      </v-btn>
        
        <v-btn class=" hover:divide-x-4" variant="plain">Berita & Pengumuman</v-btn>
        <v-btn class="mr-10 hover:divide-x-4" variant="plain">Hubungi Kami</v-btn>
  
        <div class="divide-x-4 divide-red-500 d-inline"></div>
        <Link :href="route('login')">
        <v-btn prepend-icon="mdi-login" color="blue" variant="outlined">
          Masuk/Daftar
        </v-btn>
        </Link>
        
      </div>
      <AuthLayout :dialog="dialog" @update-dialog="ToggleDialog"/>
    </div>
  
    <div class="d-flex d-sm-none w-full">
      <v-btn class="mr-auto justify-start"><v-avatar image="/img/logo.png" ></v-avatar></v-btn>
  
      <div class="justify-end">
        <v-btn
          :prepend-icon="isOverlayActive ? 'mdi-close' : 'mdi-menu'"
          @click="toggleOverlay"
          variant="plain"
        ></v-btn>
      </div>
    </div>
  </template>
  
  <script setup>
  import { inject, computed, ref } from 'vue';
  import { storeToRefs } from 'pinia'
  import { Link } from '@inertiajs/vue3';
  import AuthLayout from '@/Layouts/AuthLayout.vue';
  
  const store = inject('store');
  const dialog = ref(false);
  const ToggleDialog = () => {
    dialog.value = !dialog.value
  }
  const {listProgram } = storeToRefs(store.programStore)
  store.programStore.fetchProgram();
 
  const isOverlayActive = computed(() => store.overlay.isOverlayActive);
  
  const toggleOverlay = () => {
    store.overlay.toggleOverlay();
  };
  </script>
  