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
  import { onMounted,inject } from 'vue';
  import { usePage } from '@inertiajs/vue3'
  const store = inject('store')

  const page = usePage();
  const MitraId = page.props.mitra_id;

  store.mitraStore.setMitraId(MitraId);
  console.log(store.mitraStore.getMitraId);

  const { width, mobile} = useDisplay()
  onMounted(() => {
    
  })

  </script>
  