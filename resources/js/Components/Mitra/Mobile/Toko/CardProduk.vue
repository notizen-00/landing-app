<template>
    <v-card
      :loading="loading"
      class="mx-auto"
      max-width="300"
    >
      <template v-slot:loader="{ isActive }">
        <v-progress-linear
          :active="isActive"
          color="deep-purple"
          height="4"
          indeterminate
        ></v-progress-linear>
      </template>
  
      <v-img
        cover
        height="250"
        src="https://cdn.vuetifyjs.com/images/cards/cooking.png"
      ></v-img>
  
      <v-card-item>
        <v-card-title>Kopi Tubruk</v-card-title>
  
        <v-card-subtitle>
          <span class="me-1">12 Stok Tersedia</span>
  
          <v-icon
            color="error"
            icon="mdi-fire-circle"
            size="small"
          ></v-icon>
        </v-card-subtitle>
      </v-card-item>
  
      <v-card-text>
        <v-row
          align="center"
          class="mx-0"
        >
          <v-rating
            :model-value="4.5"
            color="amber"
            density="compact"
            half-increments
            readonly
            size="small"
          ></v-rating>
  
          <div class="text-grey ms-4">
            4.5 (413)
          </div>
        </v-row>
  
        <div class="my-4 text-subtitle-1">
          KendoKenceng Store
        </div>
  
        <div>Kopi Tubruk Nikmat Gak kenyang di</div>
      </v-card-text>
  
      <v-divider class="mx-4 mb-1"></v-divider>

      <v-card-actions>
        <v-btn
          color="deep-purple-lighten-2"
          variant="outlined"
          @click="reserve"
          prepend-icon="mdi-pencil"
        >
          Edit 
        </v-btn>
        <v-btn
        color="red"
        variant="outlined"
        prepend-icon="mdi-delete-outline"
        @click="reserve"
      >
        Hapus
      </v-btn>
      <v-btn
      color="black"
      variant="outlined"
      @click="reserve"
    >
      Archive
    </v-btn>
      </v-card-actions>
    </v-card>
  </template>

  <script>
  export default {
    data: () => ({
      loading: false,
      selection: 1,
    }),

    methods: {
      reserve () {
        this.loading = true

        setTimeout(() => (this.loading = false), 2000)
      },
    },
  }
</script>