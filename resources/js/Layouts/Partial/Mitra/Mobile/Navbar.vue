<template>
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
 
  

  </script>
  