<template>
    <v-layout ref="app" class="rounded-md">


      <v-navigation-drawer v-model="isOverlayActive" app class="z-50 h-screen d-flex d-sm-none">
       <sidebar-site/>
      </v-navigation-drawer>

      <v-app-bar color="grey-lighten-4" name="app-bar">
            <navbar-site/>
      </v-app-bar>

   
      <v-main class="d-flex flex-column align-center justify-center">
        <div class="w-full">
          <slot name="carousel"></slot>
        </div>
        
        <v-container class="bg-slate-200" fluid>
            <slot name="content"></slot>
        </v-container>
   
      </v-main>
      
        <Footer/>
     
    </v-layout>
  </template>

  <script>
  import { useLayout } from 'vuetify'
  import { inject, computed } from 'vue'
  import Footer from '@/Layouts/Partial/Site/Footer.vue'
  import NavbarSite from '@/Layouts/Partial/Site/Navbar.vue'
  import SidebarSite from '@/Layouts/Partial/Site/Mobile/Sidebar.vue'
  
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