<template>
    <v-layout ref="app" class="rounded-md">
      <v-app-bar color="grey-lighten-4" name="app-bar">
            <NavbarSite/>
      </v-app-bar>

  
      <v-main class="d-flex align-center justify-center" style="min-height: 300px;">
        <slot></slot>
      </v-main>
      
      <v-footer app class="d-sm-flex flex-column d-md-flex-column bg-black">
        <div class="bg-teal d-sm-flex d-md-flex w-100 align-center px-4">
          <strong>Kementerian Pariwisata dan Ekonomi Kreatif/Badan Pariwisata dan Ekonomi Kreatif, Republik Indonesia</strong>
    
          <v-spacer></v-spacer>
         
          <div class="d-flex justify-center">

            <v-btn
            v-for="icon in icons"
            :key="icon"
            class="mx-4"
            :icon="icon"
            variant="plain"
            size="small"
          ></v-btn>
          </div>
          
        </div>
    
        <div class="px-4 py-2 bg-black text-center w-100">
            © {{ new Date().getFullYear() }} <strong class="text-blue-300">Landing-App</strong>
        </div>
      </v-footer>
     
    </v-layout>
  </template>

  <script>
  import { useLayout } from 'vuetify'
  import Footer from '@/Layouts/Partial/Site/Footer.vue'
  import NavbarSite from '@/Layouts/Partial/Site/Navbar.vue'
  export default {
    components: { Footer,NavbarSite },
    data: () => ({
      icons: [
        'mdi-facebook',
        'mdi-twitter',
        'mdi-linkedin',
        'mdi-instagram',
      ],
    }),
  }
</script>