<template>
    <div class="d-none d-sm-flex w-full">
      <div class="mr-auto justify-start"><v-avatar image="/img/logo.png" size="50" class="m-2" color="blue" ></v-avatar></div>
  
      <div class="m-3">
        <Link :href="route('site')">
        <v-btn class="hover:divide-x-4" variant="plain">
          Beranda
        </v-btn>
        </Link>
        <v-btn class="hover:divide-x-4" variant="plain">Program</v-btn>
        
        <v-btn class="mr-10 hover:divide-x-4" variant="plain">Berita & Pengumuman</v-btn>
  
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
  import { Link } from '@inertiajs/vue3';
  import AuthLayout from '@/Layouts/AuthLayout.vue';
  
  const store = inject('store');
  const dialog = ref(false);
  const ToggleDialog = () => {
    dialog.value = !dialog.value
  }
 
  const isOverlayActive = computed(() => store.overlay.isOverlayActive);
  
  const toggleOverlay = () => {
    store.overlay.toggleOverlay();
  };
  </script>
  