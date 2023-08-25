<template>
    <AdminLayout>
       <v-container class="bg-white overflow-hidden">
        <v-breadcrumbs :items="['Home', 'Bar', 'Fizz']"></v-breadcrumbs>

        <v-card>
            <v-card-title>
              Data Mitra
              <v-spacer></v-spacer>
              <v-text-field
                v-model="search"
                append-icon="mdi-magnify"
                label="Search"
                single-line
                hide-details
              ></v-text-field>
            </v-card-title>
            <v-data-table
              :headers="headers"
              :items="data_table"
              :search="search"
            >
            <template v-slot:item="{ item }">
                <TableBody :kolom="item" />
            </template>
            </v-data-table>
          </v-card>
       </v-container>
    </AdminLayout>

</template>

<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import TableBody from '@/Pages/Admin/Mitra/Table.vue'
import { ref } from 'vue';

const props = defineProps({
    data_mitra:Object  
})

const search = ref('');
const headers = [
  
  {
    align: 'start',
    key: 'id',
    sortable: false,
    title: 'ID',
  },
  { key: 'nama_usaha', title: 'Nama Usaha' },
  { key: 'users.name', title: 'Nama Mitra' },
  { key: 'alamat_usaha', title: 'Alamat' },
  { key: 'status_mitra', title: 'Status Mitra' },
  { key: 'created_at' ,title:'Tanggal Registrasi'},
  { key: '', title: 'Action' },

];
const data_table = props.data_mitra;
</script>
