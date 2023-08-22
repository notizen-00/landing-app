<template>
  <div class="d-none d-sm-flex w-full">
    <v-btn class="mr-auto justify-start">ICON</v-btn>

    <div class="">
      <v-btn class="hover:divide-x-4" variant="plain">
        Beranda
      </v-btn>
      <v-btn class="hover:divide-x-4" variant="plain">Program</v-btn>
      
      <v-btn class="mr-10 hover:divide-x-4 " variant="plain">Berita & Pengumuman</v-btn>

      <!-- <v-divider inset vertical class="w-10 h-12" color="success"></v-divider> -->
      
      <div class="divide-x-4 divide-red-500 d-inline"></div>
      <v-btn prepend-icon="mdi-login" color="primary" variant="outlined">
        Masuk/Daftar
      </v-btn>
    </div>
  </div>

  <div class="d-flex d-sm-none w-full">
    <v-btn class="mr-auto justify-start">ICON</v-btn>

    <div class="justify-end">
      <v-btn
        :prepend-icon="isOverlayActive ? 'mdi-close' : 'mdi-menu'"
        @click="toggleOverlay"
        variant="plain"
      ></v-btn>
    </div>
  </div>
</template>

<script>
import { inject,computed } from 'vue'

export default {
  setup() {
    const store = inject('store')
    const isOverlayActive = computed(() => store.overlay.isOverlayActive)
    const toggleOverlay = () => {
      store.overlay.toggleOverlay()
    }
    return {
      toggleOverlay,
      isOverlayActive,
    }
  }
}
</script>
