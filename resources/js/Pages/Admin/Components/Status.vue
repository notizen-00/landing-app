<template>

    <v-chip
    class="ma-2"
    color="green"
    v-if="case_number == 1"
    text-color="white"
    prepend-icon="mdi-check-decagram-outline"
    >
    Aktif
  </v-chip>

  <v-chip
  class="ma-2"
  color="red"
  v-if="case_number == 0"
  text-color="red"
  prepend-icon="mdi-alert-decagram-outline"
  >
  Pending
</v-chip>


</template>
<script setup>
    defineProps({
        case_number:Number
    })
</script>