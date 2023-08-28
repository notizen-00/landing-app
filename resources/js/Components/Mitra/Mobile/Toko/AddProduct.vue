<template>
    <v-row justify="center">
      <v-dialog
        v-model="dialog"
        fullscreen
        :scrim="false"
        transition="dialog-bottom-transition"
      >
      
        <v-card>
          <form @submit.prevent="submit">
          <v-toolbar
            dark
            color="info"
          >
       
    
            <v-toolbar-title>Produk</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-toolbar-items>
              <v-btn
              icon
              dark
              @click="toggleDialog"
            >
              <v-icon>mdi-arrow-left</v-icon>
            </v-btn>
            </v-toolbar-items>
          </v-toolbar>
          <div class="form w-full mx-auto pl-10 pr-10">
        
              <v-text-field
              clearable
              v-model="form.nama_produk"
              label="Nama Produk"
              class="mt-10"
              color="info"
              rounded="xl"
               prepend-inner-icon="mdi-archive-edit-outline"
               variant="solo"
              ></v-text-field>

              <v-text-field
              clearable
              v-model="form.stok_produk"
              type="number"
              rounded="xl"
              label="Stok"
              class="mt-1"
              color="info"
               prepend-inner-icon="mdi-note-edit-outline"
               variant="solo"
              ></v-text-field>

              <v-text-field
              clearable
              v-model="form.harga_produk"
              rounded="xl"
              type="number"
              label="Harga Produk"
              class="mt-1"
              color="info"
               prepend-inner-icon="mdi-cash"
               variant="solo"
              ></v-text-field>

              <v-textarea 
              v-model="form.deskripsi_produk"
              label="Deskripsi Produk"
              variant="solo"
              prepend-inner-icon="mdi-pencil"
              color="info"
              rounded="xl">

              </v-textarea>

              <v-file-input v-model="form.foto_produk" clearable label="Foto Produk" variant="outlined"></v-file-input>
          
          </div>
          <v-divider></v-divider>
          
          <div class="-bottom-15 w-half right-4 left-4 mx-auto absolute">
            <v-btn
            variant="outlined"
            color="blue"
            type="submit"
            prepend-icon="mdi-content-save-outline"
            rounded="xl"
            block>
             Simpan 
           </v-btn>
          </div>
        </form>
        </v-card>
     
      </v-dialog>
    </v-row>
  </template>
  <script setup>
  import { computed,inject } from 'vue'
  import { useForm } from '@inertiajs/vue3'
  const store = inject('store');
  const dialog = computed(()=> store.overlay.isOverlayProductActive);

    const toggleDialog = () =>{
    store.overlay.toggleOverlayProduct()
    }

    const form = useForm({
        nama_produk:'',
        stok_produk:'',
        deskripsi_produk:'',
        harga_produk:'',
        foto_produk:'',
    });

    const submit = () =>{

        form.transform(data => ({
            forceFormData: true,
            ...data,
            })).post(route('mitra_produk.store'), {
          onFinish: () => {
          
           },
        })
    }



  </script>