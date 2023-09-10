<template>
    <v-layout ref="app" class="rounded-md">


      <v-navigation-drawer v-model="isOverlayActive" app class="z-50 h-screen d-flex d-sm-none">
       <sidebar-site/>
      </v-navigation-drawer>

      <v-app-bar   scroll-behavior="inverted fade-image"
      scroll-threshold="786"
      image="/img/carousel2.jpg" name="app-bar" elevation="0">
            <navbar-site/>
      </v-app-bar>
      
      <v-main class="d-flex flex-column align-center bg-slate-200 justify-center">
        <div :class="mobile ? 'w-full bg-grey-4' : 'w-full bg-grey-lighten-4' ">
          <slot name="carousel"></slot>
        </div>
        
        <v-container class="bg-grey-lighten-5" fluid>
            <slot name="content"></slot>
        </v-container>
   
       </v-main>
       
     <!-- <FooterSection/>
      <Footer/>  -->
     
    </v-layout>
  </template>

  <script>
  import { useLayout,useDisplay } from 'vuetify'
  import { inject, computed } from 'vue'
  import Footer from '@/Layouts/Partial/Site/Footer.vue'
  import NavbarSite from '@/Layouts/Partial/Site/Navbar.vue'
  import SidebarSite from '@/Layouts/Partial/Site/Mobile/Sidebar.vue'
  import FooterSection from '@/Layouts/Partial/Site/FooterSection.vue'
 
  export default {
    components: { Footer, NavbarSite ,SidebarSite,FooterSection },
    setup() {
      const store = inject('store')
      const { width, mobile } = useDisplay()
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
        mobile,
      
    
      }
    },
  }
  </script>