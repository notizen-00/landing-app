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
           
                <h2 class="text-h5 max-h-1 w-full inline-block mb-10 text-center text-slate-500">{{ $page.props.nama_toko }}</h2><br>

                <div class="d-flex justify-between">
                 <v-chip size="small" color="grey-lighten-1">{{ getDetailMitra ? getDetailMitra.no_mitra : 'kosong' }}</v-chip>
        
                <v-chip size="small" color="red-lighten-4" prepend-icon="mdi-fire" >{{ getDetailMitra ? getDetailMitra.program.nama_program : '-' }}</v-chip>

                </div>
                
                
                <br>
              
            </v-col>
        </v-row>

        <!-- <p class="mb-4 text-start text-slate-900 d-flex  justify-start text-body-3"> -->
          <div class="d-flex w-full mt-6">
            <div class="w-1/2">

              <v-card class="elevation-2 rounded-xl relative bg-blue-lighten-4">
                <img src="/img/product.png" class="h-full w-20 absolute -z-10 -left-11" alt="Card Image" />
                <v-card-title class="text-h4">
                  <h6 class="text-large text-center text-blue-800 font-bold"> {{ getTotalProduk }} </h6>
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
                    <h6 class="text-large text-center text-blue-800 font-bold"> {{ getDetailMitra.jumlah_karyawan }} </h6>
                  </v-card-title> 
                  <v-card-text class="text-center text-slate-800">
                    Karyawan
                  </v-card-text>
                </v-card>
              </div>
            </div>

            <div class="d-flex w-full mt-4">
              <div class="w-1/2">
  
                <v-card class="elevation-2 rounded-xl relative bg-blue-lighten-4">
                  <img src="/img/visitor.png" class="h-full w-20 absolute -z-10 -left-11" alt="Card Image" />
                  <v-card-title class="text-h4">
                    <h6 class="text-large text-center text-blue-800 font-bold">0</h6>
                  </v-card-title>
                  <v-card-text class="text-center text-slate-800">
                    Pengunjung
                  </v-card-text>
                </v-card>
                </div>
  
                <div class="ml-3 w-1/2">
                
                  <v-card class="elevation-2 rounded-xl relative bg-blue-lighten-4">
                    <img src="/img/umkm.png" class="h-full w-20 absolute -z-10 -left-11" alt="Card Image" />
                    <v-card-title class="text-h4">
                      <h6 class="text-large text-center text-blue-800 font-light">{{ getDetailMitra ? getDetailMitra.program.nama_program : '-' }}</h6>
                    </v-card-title>
                    <v-card-text class="text-center text-slate-800">
                      Jenis Umkm
                    </v-card-text>
                  </v-card>
                </div>
             
              </div>
              <v-btn class="mt-2" variant="plain" @click="scrollToTarget" color="warning">Lihat Produk</v-btn>
              
  
        
        <!-- </p> -->
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
        <div class="text-center h-50 mt-4">
          <v-sheet
          class="d-flex align-center justify-center flex-wrap text-center mx-auto px-4"
          elevation="4"
          height="300"
          rounded
          max-width="800"
          width="100%"
        >
          <div>
            <h2 class="text-h4 font-weight-black text-slate-500 mb-10">Deskripsi Mitra</h2>
      
            <blockquote class="p-4 italic border-l-4 bg-neutral-100 text-neutral-600 border-neutral-500 quote">
             " {{ getDetailMitra.deskripsi_usaha }} "
            </blockquote>
      
            <v-btn variant="text" color="orange">.....</v-btn>
          </div>
        </v-sheet>
       
      </div>

      
      <AddProduct/>
      <EditToko />
                
    </v-col>
</template>
<script setup>
import { ref,computed,inject } from 'vue'
import { usePage} from '@inertiajs/vue3'
import Status from "@/Components/Mitra/Mobile/Partial/Status.vue"
import AddProduct from "@/Components/Mitra/Mobile/Toko/AddProduct.vue"
import EditToko from "@/Components/Mitra/Mobile/Toko/EditStore.vue"
import { storeToRefs } from 'pinia';

const store = inject('store')
const page = usePage();

const status_mitra = page.props.status_mitra
const { getDetailMitra , getDialog,getTargetProduk} = storeToRefs(store.tokoStore)
const { getTotalProduk } = storeToRefs(store.produkStore)

store.tokoStore.fetchDetailMitra();

    const ToggleDialogs = () =>{
      if(status_mitra == 1){
        store.overlay.toggleOverlayProduct()
      }else{

        alert('Menunggu verifikasi admin');
      }
    }
 const scrollToTarget = () => {
  
  if (getTargetProduk) {
    getTargetProduk.value.scrollIntoView({ behavior: 'smooth' });
  }
};



</script>