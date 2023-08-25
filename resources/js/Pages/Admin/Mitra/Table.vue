<template>
    <tr>
      <td>
        {{ props.kolom.columns.id }}
      </td>
      <td>
        <div>
          <v-icon @click="toggleDetails">
            {{ showDetails ? 'mdi-chevron-up' : 'mdi-chevron-down' }}
          </v-icon>
          {{ props.kolom.columns.nama_usaha }}
        </div>
      </td>
      <td>
        {{ props.kolom.columns.no_mitra }}
      </td>
      <td>
        {{ props.kolom.columns.alamat_usaha }}
      </td>
      <td>
        <Status :case_number="props.kolom.columns.status_mitra" />
      </td>
      <td>
        <v-btn
          @click.prevent="view(props.kolom.columns.id)"
          icon="mdi-eye"
          color="primary"
          class="mr-2"
          size="small"
        ></v-btn>
        <v-btn
          @click.prevent="edit(props.kolom.columns.id)"
          icon="mdi-square-edit-outline"
          color="green"
          class="mr-2"
          size="small"
        ></v-btn>
        <v-btn
          @click="remove(props.kolom.columns.id)"
          icon="mdi-delete-circle"
          color="red"
          size="small"
        ></v-btn>
      </td>
    </tr>
    <!-- Tambahkan baris baru jika showDetails true -->
    <tr v-if="showDetails">
      <td colspan="6">
        <!-- Tampilkan konten baris baru di sini -->
        <v-chip
            v-if="showDetails"
            size="small"
            color="blue"
            prepend-icon="mdi-card-account-details-outline"
          >
            {{ props.kolom.raw.no_mitra }}
          </v-chip>
      </td>
    </tr>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  import Status from '@/Pages/Admin/Components/Status.vue';
  
  const props = defineProps({
      kolom: Object
  });
  
  const showDetails = ref(false);
  
  const view = (id) => {
      // Implement your view functionality
  };
  
  const edit = (id) => {
      // Implement your edit functionality
  };
  
  const remove = (id) => {
      // Implement your remove functionality
  };
  
  const toggleDetails = () => {
      showDetails.value = !showDetails.value;
  };
  
  </script>
  