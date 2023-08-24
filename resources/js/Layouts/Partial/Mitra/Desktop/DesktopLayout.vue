<template>
    <v-layout ref="app" class="rounded-md">


      <v-app-bar color="grey-lighten-4" name="app-bar">
            <navbar-site/>
      </v-app-bar>

   
      <v-main class="d-flex align-center justify-center" style="min-height: 300px;">
        <slot></slot>
        
      </v-main>
    
    
       <Footer/>

      
     
    </v-layout>
  </template>

  <script>
  import { useLayout } from 'vuetify'
  import { inject, computed } from 'vue'
  import Footer from '@/Layouts/Partial/Site/Footer.vue'
  import NavbarSite from '@/Layouts/Partial/Mitra/Navbar.vue'

  
  export default {
    components: { Footer, NavbarSite },
    setup() {
      
      
    },
  }
  </script>