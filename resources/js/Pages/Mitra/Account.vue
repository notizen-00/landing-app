<template>
    <template v-if="mobile">
        <PageAccount/>
      </template>
      <template v-else>
        <DesktopDashboard>
          <slot></slot>
        </DesktopDashboard>
      </template>
  </template>
  
  <script setup>
  import PageAccount from '@/Layouts/Mobile/Mitra/AccountLayout.vue'; 
  import DesktopDashboard from '@/Layouts/Desktop/Mitra/DashboardLayout.vue'; 
  import { useDisplay} from 'vuetify'
  import { onMounted } from 'vue';
  const { width, mobile} = useDisplay()

  const props = defineProps({
    data_produk:Object
  })

  // console.log(props.data_produk);
  onMounted(() => {
  
  })

  </script>
  