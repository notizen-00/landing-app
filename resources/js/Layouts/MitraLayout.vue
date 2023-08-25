<template>
    <MobileApp v-if="mobile == true">
        <slot>

        </slot>
    </MobileApp>

    <DesktopLayouts v-else >
        <slot></slot>
    </DesktopLayouts>

  </template>
  
  <script setup>
  import MobileApp from '@/App/Mitra/App.vue'; // Ganti dengan path yang sesuai
  import DesktopLayouts from '@/Layouts/Partial/Mitra/Desktop/DesktopLayout.vue'; // Ganti dengan path yang sesuai
  import { useDisplay} from 'vuetify'
  import { onMounted } from 'vue';
  const { width, mobile } = useDisplay()
  onMounted(() => {
   
  })

  </script>
  