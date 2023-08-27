<template>
    <template v-if="mobile">
        <MobileDashboard/>
      </template>
      <template v-else>
        <DesktopDashboard>
      
          <slot></slot>
        </DesktopDashboard>
      </template>
  </template>
  
  <script setup>
  import MobileDashboard from '@/Layouts/Mobile/Mitra/DashboardLayout.vue'; 
  import DesktopDashboard from '@/Layouts/Desktop/Mitra/DashboardLayout.vue'; 
  import { useDisplay} from 'vuetify'
  import { onMounted } from 'vue';
  const { width, mobile} = useDisplay()
  onMounted(() => {
  
  })

  </script>
  