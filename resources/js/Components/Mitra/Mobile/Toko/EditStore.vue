<template>
    <v-row justify="center">
        <v-dialog
          v-model="getDialog"
          fullscreen

          transition="dialog-bottom-transition"
        >
        
          <v-card           color="grey-lighten-4">
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
            <div class="form w-full mb-20 pl-10 pr-10 overflow-visible ">
          
                <v-text-field
                clearable
                v-model="form.nama_usaha"
                label="Nama Usaha"
                class="mt-10"
                color="info"
                required
                rounded="xl"
                 prepend-inner-icon="mdi-store"
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
                class="mt-1"
                color="info"
                 prepend-inner-icon="mdi-map-marker"
                 variant="solo"
                ></v-text-field>

                <v-select
                v-model="form.kecamatan"
                clearable=""
                prepend-inner-icon="mdi-sign-real-estate"
                class="no-text-transform "
                height="30"
                :items="getListKecamatan"
                item-title="name"
                item-value="name"
                :value="form.kecamatan"
                density="default"
                rounded="xl"
                label="kecamatan"
                variant="solo"
              ></v-select>
  
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
            
              
            <v-bottom-navigation
             v-model="value"
             color="primary"
             grow
           >
           <v-btn
           variant="outlined"
           type="submit"
           rounded="xl"
           min-width="100%"
           class="block bg-blue w-full p-t-4"
           >
          
            <span class="font-bold">UPDATE</span>
          </v-btn>
           </v-bottom-navigation>
            
          </form>
          </v-card>
       
        </v-dialog>
      </v-row>
</template>
<script setup>
 import { computed,inject,onMounted } from 'vue'
  import { useForm,usePage } from '@inertiajs/vue3'
import { storeToRefs } from 'pinia';
  const store = inject('store');

  const { getDialog,getDetailMitra } = storeToRefs(store.tokoStore)
  const { getListKecamatan } = storeToRefs(store.kecamatanStore) 


    store.kecamatanStore.fetchKecamatan();
  const page = usePage();
  const MitraId = store.mitraStore.getMitraId;

  

    const form = useForm({
        nama_usaha:getDetailMitra.value ? getDetailMitra.value.nama_usaha : '',
        no_ijin_usaha:getDetailMitra.value ? getDetailMitra.value.no_ijin_usaha : '',
        npwp_usaha:getDetailMitra.value ? getDetailMitra.value.npwp_usaha : '',
        alamat_usaha:getDetailMitra.value ? getDetailMitra.value.alamat_usaha : '',
        kecamatan:getDetailMitra.value ? getDetailMitra.value.nama_kecamatan : '',
        deskripsi_usaha:getDetailMitra.value ? getDetailMitra.value.deskripsi_usaha : '',
        foto_usaha:'',
        mitra_id:MitraId
    });
   

    const submit = () =>{

  

         form.transform(data => ({
            forceFormData: true,
            ...data,
            }))
        form.post(route('mitra_toko.update',{id:MitraId}), {
          onFinish: () => {
            
                
                alert('data produk berhasil di tambah')
              
           },
        })

    }

</script>

<style>
.v-text-field--box .v-input__slot,
.v-text-field--outline .v-input__slot {
  min-height: auto!important;
  display: flex!important;
  align-items: center!important;
}
</style>