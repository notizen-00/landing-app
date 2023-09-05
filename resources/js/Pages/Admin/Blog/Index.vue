<template>
  <AdminLayout>
  <v-container class="bg-white overflow-hidden">
    <v-breadcrumbs :items="['Home', 'Bar', 'Fizz']"></v-breadcrumbs>

    <v-card>
        <v-card-title>
          Data Berita
          <v-spacer></v-spacer>
            <div class="d-flex justify-between w-full">
                <div class="w-1/4">
               
                <v-text-field
                v-model="search"
                append-inner-icon="mdi-magnify"
                label="Search"
                variant="underlined"
                density="compact"
                hide-details
              ></v-text-field>
            </div>
            <div class="2/6">
              <Link  :href="route('admin_berita.create')">
                <v-btn  color="primary" prepend-icon="mdi-plus">
                    Tambah
                 </v-btn>
                </Link>
            </div>
           

        </div>
        

        </v-card-title>
        <v-data-table
          :headers="headers"
          :items="ListBlogs ? ListBlogs:[]"
          :search="search"
        >
        <template v-slot:item="{ item }">
          <tr>
            <td>{{ item.columns.id }}</td>
            <td style="width:30%;">{{ item.columns.judul }}</td>
            <td>{{ item.columns.author }}</td>
            <td class="line-clamp-3">{{ item.columns.deskripsi }} ...</td>
            <td><Status :case_number="parseInt(item.columns.status_berita)" /></td>
            <td class="w-40"> 
              <Link :href="route('admin_berita.edit',{id:item.columns.id})"><v-btn icon="mdi-square-edit-outline" color="green" class="mr-2" size="small"></v-btn></Link>
              <v-btn @click.prevent="remove(item.columns.id)" icon="mdi-delete-circle" color="red" size="small"></v-btn>
              
            </td>
          </tr>
        </template>
        </v-data-table>
      </v-card>
    
   </v-container>

</AdminLayout>

</template>
<script setup>
  import AdminLayout from '@/Layouts/AdminLayout.vue';
  import { Link } from '@inertiajs/vue3';
  import { storeToRefs } from 'pinia';
  import {ref,inject } from 'vue'
  import Status from '@/Pages/Admin/Components/Status.vue'
  const search = ref();
  const store = inject('store')

  const { ListBlogs } = storeToRefs(store.blogStore)

  const headers = [
  {
    align: 'start',
    key: 'id',
    sortable: false,
    title: 'ID',
  },
  { key: 'judul', title: 'Judul' },
  { key: 'author', title: 'Author' },
  { key: 'deskripsi', title: 'Deskripsi berita' },
  { key: 'status_berita', title: 'Status' },
  { key: 'action', title: 'Action' },
  ];

  store.blogStore.fetchBerita();



</script>