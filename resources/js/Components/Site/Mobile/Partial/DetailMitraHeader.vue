<template>
        {{ getDetailMitra.nama_usaha }}
</template>
<script setup>
import { inject } from 'vue'
import {storeToRefs} from 'pinia'
const store = inject('store') 
   const { getDetailMitra } = storeToRefs(store.siteStore)
    console.log(getDetailMitra)

</script>