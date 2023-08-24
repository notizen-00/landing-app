<template>
    <div class="d-flex d-sm-none w-full">
      <v-btn class="mr-auto justify-start pt-6">ICON</v-btn>
  
      <div class="justify-end">
        <v-btn class="text-none" @click="ToggleNotif" color="dark" stacked>
          <v-badge content="0" color="primary">
            <v-icon>mdi-bell-outline</v-icon>
          </v-badge>
        </v-btn>
      </div>
    </div>
  </template>
  
  <script setup>
  import { inject, computed, ref } from 'vue';
  import { Link } from '@inertiajs/vue3';

  const store = inject('store')
  const ToggleNotif = () =>{
  store.overlay.toggleOverlay();
 }

  </script>
  