<template>
    <v-chip v-if="case_number == 0"
    class="d-flex bg-red mt-2 pl-4 justify-start w-1/2"
    size="small"
    prepend-icon="mdi-account-cancel-outline"
    >
    <span>Pending</span>
  </v-chip>

  <v-chip v-if="case_number == 1"
  class="d-flex bg-green mt-2 pl-4 justify-start w-1/2"
  size="small"
  prepend-icon="mdi-account-check-outline"
  >
  <span>Aktif</span>
</v-chip>
</template>
<script setup>
    defineProps({
     case_number:null
    })
</script>