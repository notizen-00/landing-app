<template>
    <div class="d-flex d-sm-none w-full">
      <v-btn class="mr-auto justify-start w-1/4 pt-6">ICON</v-btn>
       <div class="items-center my-auto w-1/2 justify-center">
        <h6 class="text-center ">DASHBOARD</h6>
        </div> 
      <!-- <div class="justify-end w-1/4"> -->
        <v-btn class="text-none w-1/4" @click="ToggleNotif" color="dark" stacked>
          <v-badge content="0" color="primary">
            <v-icon>mdi-bell-outline</v-icon>
          </v-badge>
        </v-btn>
      <!-- </div> -->
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
  