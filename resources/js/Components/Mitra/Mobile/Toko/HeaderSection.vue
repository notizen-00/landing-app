<template>

    <v-col col="12">
        <v-sheet
        elevation="0"
        rounded="lg"
        width="100%"
        color="white"
        class="pa-4 bg-blue-500/50 text-center rounded-t-xl mx-auto relative"
        >
        <v-row>
            <v-col cols="12">
                <v-avatar
                class="mb-5 border-2 absolute -mt-7"
                color="primary"
                icon="mdi-store"
                size="50"
                >{{ $page.props.auth.user.name.substr(0,3) }} {{ $page.props.nama_toko }} </v-avatar>
           
                <h2 class="text-h5 max-h-1 w-full inline-block mb-10 text-center text-slate-500">{{ $page.props.nama_toko }}</h2>
                <br>
              
            </v-col>
        </v-row>

        <p class="mb-4 text-start text-slate-900 text-body-3">
            <v-badge :content="0" color="red">
                <v-icon icon="mdi-package-variant-closed" color="info" size="x-large"></v-icon>
              </v-badge>
        
        </p>
        <br>

        <v-divider class="mb-4 border-opacity-50" :thickness="4" color="info"></v-divider>

            <div class="text-center">
                <v-btn
                  variant="outlined"
                  color="blue"
                  prepend-icon="mdi-plus"
                  @click="ToggleDialogs"
                  block>
                    Tambah Product
                </v-btn>
            </div>
        </v-sheet>
        <AddProduct/>
                
    </v-col>
</template>
<script setup>
import { ref,computed,inject } from 'vue'
import Status from "@/Components/Mitra/Mobile/Partial/Status.vue"
import AddProduct from "@/Components/Mitra/Mobile/Toko/AddProduct.vue"



const store = inject('store')

const ToggleDialogs = () =>{
  store.overlay.toggleOverlayProduct();
 }


</script>