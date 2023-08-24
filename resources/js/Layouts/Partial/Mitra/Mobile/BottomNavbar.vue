<template>
  <v-bottom-navigation
    v-model="tabs"
    bg-color="purple"
    mode="shift"
    class="d-flex d-sm-none"
  >
    <!-- <Link :href="route('mitra.index')"> -->
    <v-btn >
      <v-icon>mdi-view-dashboard-outline</v-icon>
      <span>Dashboard</span>
    </v-btn>
    <!-- </Link> -->

    <v-btn>
      <v-icon>mdi-music-note</v-icon>
      <span>Music</span>
    </v-btn>

    <v-btn >
      <v-icon>mdi-store-outline</v-icon>
      <span>Toko</span>
    </v-btn>

    <v-btn>
      <v-icon>mdi-account</v-icon>
      <span>Account</span>
    </v-btn>
  </v-bottom-navigation>
</template>

<script setup>
import { computed,ref,inject} from 'vue'
import { Head, Link,useForm } from '@inertiajs/vue3';

const tabs = ref(0)
const value = computed(()=> tabs.value)



</script>
