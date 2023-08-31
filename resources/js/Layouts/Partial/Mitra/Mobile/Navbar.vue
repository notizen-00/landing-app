<template>
    <div class="d-flex d-sm-none w-full">

      <form @submit.prevent="logout" class="mr-auto justify-center w-1/4 pt-3 ml-3">
        <v-btn type="submit" color="primary" icon="mdi-logout">

        </v-btn>
      </form>
     

       <div class="items-center my-auto w-1/2 justify-center">
        <h6 class="text-center ">{{ getTopBar }}</h6>
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
  import {storeToRefs} from 'pinia'
  import { Link,router } from '@inertiajs/vue3';

  const store = inject('store')

  const { getTopBar } = storeToRefs(store.mitraStore)

  const ToggleNotif = () =>{
  store.overlay.toggleOverlay();
 }

 const logout = () =>{
  router.post(route('logout'));
 }

  </script>
  