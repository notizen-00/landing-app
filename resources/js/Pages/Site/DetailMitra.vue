<template>
    <SiteLayout>

    <template #content v-if="mobile" >
        <HeaderDetailMobile />
    </template>
    <template #content v-else >

    </template>
    </SiteLayout>
  </template>
  <script setup>
  import SiteLayout from "@/Layouts/SiteLayout.vue";
  import HeaderDetailMobile from '@/Components/Site/Mobile/Partial/DetailMitraHeader.vue'

  import { storeToRefs } from "pinia";
  import { ref,inject,onMounted,computed,watch } from "vue";
  import { useDisplay } from "vuetify";
  
  const { mobile } = useDisplay()
  const store = inject('store')





  </script>
  
  