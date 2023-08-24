<template>
    <v-bottom-navigation
    v-model="value"
    :bg-color="color"
    mode="shift"
    class="d-flex d-sm-none"
  >
    <v-btn>
      <v-icon>mdi-view-dashboard-outline</v-icon>

      <span>Dashboard</span>
    </v-btn>

    <v-btn>
      <v-icon>mdi-music-note</v-icon>

      <span>Music</span>
    </v-btn>

    <v-btn>
      <v-icon>mdi-store-outline</v-icon>

      <span>Toko </span>
    </v-btn>

    <v-btn>
      <v-icon>mdi-account</v-icon>

      <span>Account</span>
    </v-btn>
  </v-bottom-navigation>

</template>

<script>
import { useLayout } from 'vuetify'
  import { inject, computed } from 'vue'
  import SidebarSite from '@/Layouts/Partial/Mitra/Mobile/Sidebar.vue'
  
  export default {
    data: () => ({ value: 0 }),
    computed: {
      color () {
        switch (this.value) {
          case 0: return 'purple'
          case 1: return 'teal'
          case 2: return 'brown'
          case 3: return 'indigo'
          default: return 'blue-grey'
        }
      },
    },

    
  }
</script>