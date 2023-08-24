<template>
    <div class="d-none d-sm-flex w-full">
      <v-btn class="mr-auto justify-start">ICON</v-btn>
  
      <div class="">
        <v-btn class="hover:divide-x-4" variant="plain">
          Dashboard
        </v-btn>
        <v-btn class="hover:divide-x-4" variant="plain">Produk</v-btn>
        
        <v-btn class="mr-10 hover:divide-x-4 " variant="plain">Toko</v-btn>
  
        <div class="divide-x-4 divide-red-500 d-inline"></div>
        <Link :href="route('dashboard')">
        <v-btn prepend-icon="mdi-login" color="primary" variant="outlined">
            {{ $page.props.auth.user.name }}
        </v-btn>
        </Link>
        
      </div>
      <AuthLayout :dialog="dialog" @update-dialog="ToggleDialog"/>
    </div>
  
    <div class="d-flex d-sm-none w-full">
      <v-btn class="mr-auto justify-start">ICON</v-btn>
  
      <div class="justify-end">
        <v-avatar
        color="brown"
        class="mr-3"
        >
        <span class="text-small">{{ $page.props.auth.user.name.substring(0,3) }}</span>
      </v-avatar>
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
  