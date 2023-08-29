<template>
    <MobileLayout>  
        <v-container class="relative bg-blue-100 rounded-t-xl h-full">
          <v-row>
    
          <header-content></header-content>
          
          </v-row>
          <v-row>
            <v-col col="12" class="relative">
            <CardProduct/>
            </v-col>
          </v-row>

          <AddProduct/>
          <EditProduct/>
    
        </v-container>
      
    </MobileLayout>
    </template>
    <script setup>
        import MobileLayout from '@/Layouts/Partial/Mitra/Mobile/MobileLayout.vue';
        import HeaderContent from '@/Components/Mitra/Mobile/Toko/HeaderSection.vue';
        import CardProduct from '@/Components/Mitra/Mobile/Toko/CardProduk.vue'
        import AddProduct from '@/Components/Mitra/Mobile/Toko/AddProduct.vue'
        import EditProduct from '@/Components/Mitra/Mobile/Toko/EditProduct.vue'
        import { inject,ref } from 'vue'

        const store = inject('store')

    </script>