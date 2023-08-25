<template>
  <div>
    <v-alert
      v-model="alert"
      v-if="$page.props.flash.success"
      border="start"
      color="success"
      icon="$success"
      class="mt-2"
      closable
      close-label="Close Alert"
      title="Sukses"
    >
      {{ $page.props.flash.success }}
    </v-alert>

    <v-alert
      v-model="alert"
      v-if="$page.props.flash.error"
      border="start"
      color="danger"
      class="mt-2"
      icon="$danger"
      closable
      close-label="Close Alert"
      title="Gagal"
    >
      {{ $page.props.flash.error }}
    </v-alert>
  </div>
</template>

<script setup>
import { ref } from 'vue';

const alert = ref(true);


</script>
