<template>
    <template v-if="mobile">
        <PageToko/>
      </template>
      <template v-else>
        <DesktopDashboard>
          <slot></slot>
        </DesktopDashboard>
      </template>
  </template>
  
  <script setup>
  import PageToko from '@/Layouts/Mobile/Mitra/TokoLayout.vue'; 
  import DesktopDashboard from '@/Layouts/Desktop/Mitra/DashboardLayout.vue'; 
  import { useDisplay} from 'vuetify'
  import { onMounted } from 'vue';
  const { width, mobile} = useDisplay()
  onMounted(() => {
  
  })

  </script>
  