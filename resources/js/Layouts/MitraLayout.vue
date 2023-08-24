<template>
   
         
              <MobileLayouts v-if="mobile == true"/>

              <DesktopLayouts v-else />
            
  </template>
  
  <script setup>
  import MobileLayouts from '@/Layouts/Partial/Mitra/Mobile/MobileLayout.vue'; // Ganti dengan path yang sesuai
  import DesktopLayouts from '@/Layouts/Partial/Mitra/Desktop/DesktopLayout.vue'; // Ganti dengan path yang sesuai
  import { useDisplay} from 'vuetify'
  import { onMounted } from 'vue';
  const { width, mobile } = useDisplay()
  onMounted(() => {
   
  })

  </script>
  