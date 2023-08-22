<template>
    <v-layout ref="app" class="rounded-md">


      <v-navigation-drawer v-model="isOverlayActive" app class="z-50 h-screen d-flex d-sm-none">
       <sidebar-site/>
      </v-navigation-drawer>

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
  import NavbarSite from '@/Layouts/Partial/Site/Navbar.vue'
  import SidebarSite from '@/Layouts/Partial/Site/Mobile/SideBar.vue'
  
  export default {
    components: { Footer, NavbarSite ,SidebarSite },
    setup() {
      const store = inject('store')
  
      const toggleOverlay = () => {
        store.overlay.toggleOverlay()
      }
      const isOverlayActive = computed({
        get: () => store.overlay.isOverlayActive,
        set: toggleOverlay,
      })
  
      return {
        isOverlayActive,
        toggleOverlay,
    
      }
    },
  }
  </script>