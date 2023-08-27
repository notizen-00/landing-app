<template>
    <MobileLayout>  
        <v-container class="relative bg-blue-100 rounded-t-xl h-full">
          <v-row>
    
          <header-content></header-content>
          
          </v-row>
          <v-row>
            <v-col col="12">
            <CardProduk/>
            </v-col>
          </v-row>
    
        </v-container>
      
    </MobileLayout>
    </template>
    <script setup>
        import MobileLayout from '@/Layouts/Partial/Mitra/Mobile/MobileLayout.vue';
        import HeaderContent from '@/Components/Mitra/Mobile/Dashboard/HeaderContent.vue';
        import CardProduk from '@/Components/Mitra/Mobile/Toko/CardProduk.vue'

    </script>