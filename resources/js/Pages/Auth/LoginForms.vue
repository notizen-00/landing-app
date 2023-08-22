<template>
    <form @submit.prevent="submit">
        <v-card
          class="mx-auto pa-12 pb-8 mb-10 bg-purple-800"
          elevation="8"
          max-width="600"
          rounded="shapes"
        >
        <v-alert
          v-if="form.errors"
          v-model="alert"
          closable
          icon="$vuetify"
          title="Gagal Login"
          color="red"
          :text="form.errors.password"
          variant="tonal"
        ></v-alert>
          <div class="text-subtitle-1 text-medium-emphasis">Email </div>
    
          <v-text-field
            density="compact"
            color="primary"
            type="email"
            v-model="form.email"
            placeholder="Masukan Email"
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
            v-model="form.password"
            placeholder="Masukan Password Anda"
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
            Masuk
          </v-btn>

        </v-card>
      </form>
</template>
<script setup>
  import { defineProps, computed,ref} from 'vue';
  import { Head, Link, useForm } from '@inertiajs/vue3';
  const props = defineProps({
    visible:Boolean,
  });
  const alert = ref(false);
  const form = useForm({
    email: '',
    password: '',
    remember: false,
});
const submit = () => {
    form.transform(data => ({
        ...data,
        remember: form.remember ? 'on' : '',
    })).post(route('login'), {
        onFinish: () => 
        {
            form.reset('password','email')
            alert.value = !alert.value
        }
        ,
    });
};
  
 

  </script>