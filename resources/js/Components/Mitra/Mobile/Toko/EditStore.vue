<template>
    <v-row justify="center">
        <v-dialog
          v-model="getDialog"
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
         
      
              <v-toolbar-title>Edit Toko</v-toolbar-title>
              <v-spacer></v-spacer>
              <v-toolbar-items>
                <v-btn
                icon
                dark
                @click="store.tokoStore.toggleDialog()"
              >
                <v-icon>mdi-arrow-left</v-icon>
              </v-btn>
              </v-toolbar-items>
            </v-toolbar>
            <div class="form w-full mx-auto pl-10 pr-10">
          
                <v-text-field
                clearable
                v-model="form.nama_usaha"
                label="Nama Usaha"
                class="mt-10"
                color="info"
                required
                rounded="xl"
                 prepend-inner-icon="mdi-archive-edit-outline"
                 variant="solo"
                ></v-text-field>
  
                <v-text-field
                clearable
                v-model="form.no_ijin_usaha"
                type="number"
                required
                rounded="xl"
                label="Nomor Ijin Usaha"
                class="mt-1"
                color="info"
                 prepend-inner-icon="mdi-note-edit-outline"
                 variant="solo"
                ></v-text-field>

                <v-text-field
                clearable
                v-model="form.npwp_usaha"
                type="text" 
                required
                rounded="xl"
                label="Nomor NPWP"
                class="mt-1"
                color="info"
                 prepend-inner-icon="mdi-note-edit-outline"
                 variant="solo"
                ></v-text-field>
  

                <v-text-field
                clearable
                v-model="form.alamat_usaha"
                rounded="xl"
                required
                type="text"
                label="Alamat Usaha"
                class="mt-10  "
                color="info"
                 prepend-inner-icon="mdi-map-marker"
                 variant="solo"
                ></v-text-field>
  
                <v-textarea 
                v-model="form.deskripsi_usaha"
                label="Deskripsi Usaha"
                variant="solo"
                required
                prepend-inner-icon="mdi-pencil"
                color="info"
                rounded="xl">
  
                </v-textarea>
  
                <v-text-field
                clearable
                @input="form.foto_produk = $event.target.files[0]"
                rounded="xl"
                type="file"
                required
                label="Foto Produk"
                class="mt-1"
                color="info"
                 prepend-inner-icon="mdi-upload"
                 variant="solo"
                ></v-text-field>
                <!-- <v-file-input v-model="form.foto_produk" clearable label="Foto Produk" variant="outlined"></v-file-input> -->
            
            </div>
            <input type="hidden" name="mitra_id" v-model="form.mitra_id"/>
            <v-divider></v-divider>
            
            <div class="w-half right-4 left-4 mx-auto">
              <v-btn
              variant="outlined"
              color="blue"
              type="submit"
              prepend-icon="mdi-content-save-outline"
              rounded="xl"
              class="fixed bottom-0 w-1/2 "
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
  import { useForm,usePage } from '@inertiajs/vue3'
import { storeToRefs } from 'pinia';
  const store = inject('store');

  const { getDialog,getDetailMitra } = storeToRefs(store.tokoStore)


  const page = usePage();
  const MitraId = store.mitraStore.getMitraId;

    const form = useForm({
        nama_usaha:getDetailMitra.value ? getDetailMitra.value.nama_usaha : '',
        no_ijin_usaha:getDetailMitra.value ? getDetailMitra.value.no_ijin_usaha : '',
        npwp_usaha:getDetailMitra.value ? getDetailMitra.value.npwp_usaha : '',
        alamat_usaha:getDetailMitra.value ? getDetailMitra.value.alamat_usaha : '',
        kecamatan:getDetailMitra.value ? getDetailMitra.value.kecamatan : '',
        deskripsi_usaha:getDetailMitra.value ? getDetailMitra.value.deskripsi_usaha : '',
        foto_usaha:'',
        mitra_id:MitraId
    });

    const submit = () =>{

         form.transform(data => ({
            forceFormData: true,
            ...data,
            }))
        form.post(route('mitra_produk.store'), {
          onFinish: () => {
                toggleDialog();
                store.produkStore.fetchProduk(MitraId)
                alert('data produk berhasil di tambah')
              
           },
        })

    }

    


</script>