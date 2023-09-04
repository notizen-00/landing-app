<template>
    <v-list>
        <v-list-item
          prepend-avatar="/img/logo.png"
          title="Landing-App"
          subtitle="Masuk / Daftar"
        >
          <template v-slot:append>
            <v-btn
              size="small"
              variant="text"
              color="primary"
              icon="mdi-login"
              @click="toggleOverlay"
            ></v-btn>
          </template>
        </v-list-item>
      </v-list>

      <v-divider></v-divider>

      <v-list
        :lines="false"
        density="compact"
        nav
      >
        <v-list-item
          v-for="(item, i) in items"
          :key="i"
          :value="item"
          color="primary"
          class="text-lg"
        >
        <v-list-item-title v-text="item.text"></v-list-item-title>
        </v-list-item>
        <v-list-group value="Program">
            <template v-slot:activator="{ props }">
              <v-list-item
                v-bind="props"
                title="Program"
              ></v-list-item>
            </template>
              <v-list-item
                v-for="(program,i) in programs"
                :key="i"
                :value="program"
                :title="program.text"
                color="primary"
              >
              </v-list-item>
          </v-list-group>
      </v-list>
</template>
<script >
import { useLayout } from 'vuetify'
import { inject, computed } from 'vue'
import { router } from '@inertiajs/vue3'

export default {
  setup() {
    const store = inject('store')

    const toggleOverlay = () => {
      router.get('/login');
    }
  
    const items = [
      { text: 'Beranda', icon: 'mdi-folder' },
      { text: 'Berita dan Pengumuman', icon: 'mdi-star' },
    ]

    const programs = [
        { text:'Program 1'},
        { text:'Program 2'},
        { text:'Program 3'},
    ]

    return {
    toggleOverlay,
    items,
    programs
    }
  },
}
</script>