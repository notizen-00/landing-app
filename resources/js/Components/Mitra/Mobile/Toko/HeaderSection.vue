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
                color="blue"
                icon="mdi-store"
                size="70"
                >{{ $page.props.auth.user.name.substr(0,3) }} {{ $page.props.nama_toko }} </v-avatar>
           
                <h2 class="text-h5 max-h-1 w-full inline-block mb-10 text-center text-slate-500">{{ $page.props.nama_toko }}</h2>
                <br>
              
            </v-col>
        </v-row>

        <p class="mb-4 text-start text-slate-900 d-flex  justify-start text-body-3">
            <v-badge :content="0" color="red" class="w-1/2">
                 <v-btn prepend-icon="mdi-package-variant-closed" color="yellow" rounded="shaped" class="w-full text-slate-100" size="small" stacked>
                    <span class="text-slate-700">Produk</span>
                 </v-btn>
              </v-badge>

              <v-badge :content="0" color="red" class="ml-3 w-1/2">
                <v-btn prepend-icon="mdi-eye-circle-outline" color="yellow" rounded="shaped" class="w-full"  size="small" stacked>
                   <span class="text-slate-700">Visitor</span>
                </v-btn>
             </v-badge>
              <!-- <v-badge :content="0" color="red" class="ml-3" floating stacked>
                <v-icon icon="mdi-eye-circle-outline" color="info" size="x-large"></v-icon>
                Visitor
              </v-badge> -->
        
        </p>
        <br>

        <v-divider class="mb-4 border-opacity-50" :thickness="4" color="info"></v-divider>

            <div class="text-center h-50">
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
        <v-sheet
        elevation="12"
        max-width="600"
        rounded="lg"
        width="100%"
        class="pa-4 text-center mx-auto mt-4 w-screen relative z-50"
      >
        <v-icon
          class="mb-5"
          color="success"
          icon="mdi-check-circle"
          size="112"
        ></v-icon>
    
        <h2 class="text-h5 mb-6">You reconciled this account</h2>
    
        <p class="mb-4 text-medium-emphasis text-body-2">
          To see a report on this reconciliation, click <a href="#" class="text-decoration-none text-info">View reconciliation report.</a>
    
          <br>
    
          Otherwise, you're done!
        </p>
    
        <v-divider class="mb-4"></v-divider>
    
        <div class="text-end">
          <v-btn
            class="text-none"
            color="success"
            rounded
            variant="flat"
            width="90"
          >
            Done
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