<template>
    <tr>
      <td>
        {{ props.kolom.columns.id }}
      </td>
      <td>
        <div class="mt-4">
          <v-icon @click="toggleDetails">
            {{ showDetails ? 'mdi-chevron-up' : 'mdi-chevron-down' }}
          </v-icon>
          {{ props.kolom.columns.nama_usaha }}
          <br>
       
          <v-chip
          size="small"
          color="blue"
          class="ml-10"
          prepend-icon="mdi-tag-outline"
          >
          {{ props.kolom.raw.program.nama_program  }}
          </v-chip>

       
        </div>
      </td>
      <td>
        {{ props.kolom.raw.users.name }}
      </td>
      <td>
        {{ props.kolom.columns.alamat_usaha }}
      </td>
      <td>
        <Status :case_number="convertToInteger(props.kolom.columns.status_mitra)" />
      </td>
      <td>
        {{ formatDate(props.kolom.columns.created_at) }}
      </td>
      <td>
        
       
          <v-btn
          icon
          @click.prevent="OnVerifikasi(props.kolom.columns.id)"
          color="success"
          class="mr-2"
          size="small"
          rounded="xl"
        > 
          <v-icon color="green-lighten-5" >mdi-check-decagram-outline</v-icon>
        </v-btn>
      

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

          <!-- <Link> -->
            <v-chip
            v-if="showDetails"
            size="small"
            color="green"
            prepend-icon="mdi-whatsapp"
            >
            {{ props.kolom.raw.users.no_hp  }}
            </v-chip>

            <v-chip
            v-if="showDetails"
            size="small"
            color="primary"
            prepend-icon="mdi-note-outline"
            >
            {{ props.kolom.raw.no_ijin_usaha  }}
            </v-chip>

            <v-chip
            v-if="showDetails"
            size="small"
            color="warning"
            prepend-icon="mdi-credit-card-outline"
            >
            {{ props.kolom.raw.npwp_usaha  }}
            </v-chip>
          <!-- </Link> -->
      </td>
    </tr>
    <v-snackbar
    v-model="snackbar"
    color="success"
    :timeout="timeout"
  >
    {{ text }}

    <template v-slot:actions>
      <v-btn
        color="white"
        variant="text"
        @click="snackbar = false"
      >
        Close
      </v-btn>
    </template>
  </v-snackbar>
  </template>
  
  <script setup>
  import { ref,onMounted,computed } from 'vue';
  import Status from '@/Pages/Admin/Components/Status.vue';
  import axios from 'axios';
  import {OnDataUpdate,verifikasi} from '@/Service/Mitra'
  
  const props = defineProps({
      kolom: Object
  });
  const url = window.location.origin;
  const show = ref(false)

 const convertToInteger = (value) => {
      return parseInt(value);
    }
  const formatDate = (date) => {
      const options = { year: 'numeric', month: '2-digit', day: '2-digit' };
      return new Date(date).toLocaleDateString(undefined, options);
  }
  
  const showDetails = ref(false);
  const snackbar = ref(false);
  const timeout = ref();
  const text = ref();
  const emit = defineEmits(['on-verifikasi']);

  const OnVerifikasi = async(id) => {
    
     const result = await verifikasi(id);
     snackbar.value = true;
     timeout.value = 2000;
     text.value = result.message;
     emit('on-verifikasi');

  };

  const updatedDetail = computed(()=>{ 
    detail.value
    
  });

  
  const remove = (id) => {
      // Implement your remove functionality
  };
  
  const toggleDetails = () => {
      showDetails.value = !showDetails.value;
  };
  
  </script>
  