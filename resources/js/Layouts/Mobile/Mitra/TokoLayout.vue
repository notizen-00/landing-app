<template>
    <MobileLayout>  
        <v-container class="relative bg-blue-100 rounded-t-xl h-full">
          <v-row>
    
          <header-content></header-content>
          
          </v-row>
          <v-row>
            <v-col col="12">
            <CardProduct/>
            </v-col>
          </v-row>

          <AddProduct/>
    
        </v-container>
      
    </MobileLayout>
    </template>
    <script setup>
        import MobileLayout from '@/Layouts/Partial/Mitra/Mobile/MobileLayout.vue';
        import HeaderContent from '@/Components/Mitra/Mobile/Toko/HeaderSection.vue';
        import CardProduct from '@/Components/Mitra/Mobile/Toko/CardProduk.vue'
        import AddProduct from '@/Components/Mitra/Mobile/Toko/AddProduct.vue'
        import { inject,ref } from 'vue'

        const store = inject('store')

    </script>