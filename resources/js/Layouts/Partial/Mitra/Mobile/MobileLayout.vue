<template>
    <v-layout ref="app" class="rounded-md">

      <v-app-bar height="70" name="app-bar" scroll-behavior="elevate">
            <navbar-site/>
      </v-app-bar>

      <v-main class="d-flex align-center justify-center" >
        <slot></slot>
      </v-main>
    
      <BottomNavbar />
            <Notification/>
   
    </v-layout>
  </template>

  <script setup>
  import { useLayout } from 'vuetify'
  import { inject, computed } from 'vue'
  import NavbarSite from '@/Layouts/Partial/Mitra/Mobile/Navbar.vue'
  import BottomNavbar from '@/Layouts/Partial/Mitra/Mobile/BottomNavbar.vue'
  import Notification from '@/Components/Mitra/Mobile/Notification.vue'
  
  </script>