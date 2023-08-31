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
                icon="mdi-account"
                size="70"
                >{{ $page.props.auth.user.name.substr(0,3) }} {{ $page.props.nama_toko }} </v-avatar>
           
                <h2 class="text-h5 max-h-1 w-full inline-block mb-10 text-center text-slate-500">{{ $page.props.auth.user.name }}</h2>
                <br>
                <br>
              
            </v-col>
        </v-row>

        <p class="mb-4 text-start text-slate-900 d-flex  justify-start text-body-3">
            <div class="w-1/2">

              <v-card class="elevation-2 rounded-xl relative bg-blue-lighten-4">
                <img src="/img/product.png" class="h-full w-20 absolute -z-10 -left-11" alt="Card Image" />
                <v-card-title class="text-h4">
                  <h6 class="text-large text-center text-blue-800 font-bold">50</h6>
                </v-card-title>
                <v-card-text class="text-center text-slate-800">
                  Produk Mitra
                </v-card-text>
              </v-card>
              </div>

              <div class="ml-3 w-1/2">
              
                <v-card class="elevation-2 rounded-xl relative bg-blue-lighten-4">
                  <img src="/img/icons/account-group.png" class="h-full w-20 absolute -z-10 -left-11" alt="Card Image" />
                  <v-card-title class="text-h4">
                    <h6 class="text-large text-center text-blue-800 font-bold">50</h6>
                  </v-card-title>
                  <v-card-text class="text-center text-slate-800">
                    Karyawan
                  </v-card-text>
                </v-card>
              </div>
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
                  prepend-icon="mdi-pencil"
                  @click=""
                  block>
                    Edit Profile
                </v-btn>
            </div>

            
        </v-sheet>
       
        <AddProduct/>
                
    </v-col>
</template>
<script setup>
import { ref,computed,inject } from 'vue'
import { usePage} from '@inertiajs/vue3'
import Status from "@/Components/Mitra/Mobile/Partial/Status.vue"
import AddProduct from "@/Components/Mitra/Mobile/Toko/AddProduct.vue"

const store = inject('store')
const page = usePage();

const status_mitra = page.props.status_mitra;

    const ToggleDialogs = () =>{
      if(status_mitra == 1){
        store.overlay.toggleOverlayProduct()
      }else{

        alert('Menunggu verifikasi admin');
      }
   
    }


</script>