<template>
    <form>
        <v-card
          class="mx-auto pa-12 pb-8 mb-10 bg-purple-800"
          elevation="8"
          max-width="600"
          rounded="shapes"
        >

        <div class="text-subtitle-1 text-medium-emphasis">Nama Lengkap</div>
    
        <v-text-field
          density="compact"
          color="primary"
          placeholder="Masukan Nama Lengkap"
          prepend-inner-icon="mdi-badge-account"
          variant="outlined"
        ></v-text-field>

          <div class="text-subtitle-1 text-medium-emphasis">Email</div>
    
          <v-text-field
            density="compact"
            color="primary"
            placeholder="Email address"
            prepend-inner-icon="mdi-email-outline"
            variant="outlined"
          ></v-text-field>
    
          <div class="text-subtitle-1 text-medium-emphasis d-flex align-center justify-space-between">
            Password
          </div>
    
          <v-text-field
            :append-inner-icon="visible ? 'mdi-eye-off' : 'mdi-eye'"
            :type="visible ? 'text' : 'password'"
            density="compact"
            autocomplete
            placeholder="Enter your password"
            prepend-inner-icon="mdi-lock-outline"
            variant="outlined"
            color="primary"
            @click:append-inner="visible = !visible"
          ></v-text-field>

          <div class="text-subtitle-1 text-medium-emphasis d-flex align-center justify-space-between">
            Konfirmasi Password
          </div>
    
          <v-text-field
            :append-inner-icon="visible ? 'mdi-eye-off' : 'mdi-eye'"
            :type="visible ? 'text' : 'password'"
            density="compact"
            autocomplete
            placeholder="Konfirmasi Password"
            prepend-inner-icon="mdi-lock-outline"
            variant="outlined"
            color="primary"
            @click:append-inner="visible = !visible"
          ></v-text-field>
    
          <v-btn
            block
            type="submit"
            class="mb-8"
            color="purple"
            size="large"
            variant="tonal"
          >
            Daftar Akun
          </v-btn>
    
    
        </v-card>
      </form>
</template>
<script setup>
  import { defineProps, computed } from 'vue';
  
  const props = defineProps({
    visible:Boolean
  });
  
 

  </script>