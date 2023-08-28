<template>
    <v-row justify="center">
      <v-dialog
        v-model="dialog"
        fullscreen
        :scrim="false"
        transition="dialog-bottom-transition"
      >
     
        <v-card>
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
            <form>
              <v-text-field
              clearable
              label="Nama Produk"
              class="mt-10"
              color="info"
              rounded="xl"
               prepend-inner-icon="$vuetify"
               variant="solo"
              ></v-text-field>

              <v-text-field
              clearable
              rounded="xl"
              label="Stok"
              class="mt-1"
              color="info"
               prepend-inner-icon="$vuetify"
               variant="solo"
              ></v-text-field>

              <v-text-field
              clearable
              rounded="xl"
              label="Harga Produk"
              class="mt-1"
              color="info"
               prepend-inner-icon="$vuetify"
               variant="solo"
              ></v-text-field>

              <v-textarea 
              label="Deskripsi Produk"
              variant="solo"
              prepend-inner-icon="mdi-pencil"
              color="info"
              rounded="xl">

              </v-textarea>

              <v-file-input clearable label="Foto Produk" prepend-inner-icon="mdi-plus" variant="outlined"></v-file-input>
            </form>
          </div>
          <v-divider></v-divider>
          
          <div class="h-20 bottom-0 w-half right-4 left-4 mx-auto absolute">
            <v-btn
            variant="outlined"
            color="blue"
            prepend-icon="mdi-content-save-outline"
            rounded="xl"
            block>
             Simpan 
           </v-btn>
          </div>
        </v-card>
      </v-dialog>
    </v-row>
  </template>
  <script setup>
  import { computed,inject } from 'vue'
 
  const store = inject('store');
  const dialog = computed(()=>store.overlay.isOverlayProductActive);

    const toggleDialog = () =>{
    store.overlay.toggleOverlayProduct()
    }



  </script>