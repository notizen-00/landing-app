<template>
    <SiteLayout>
      <v-carousel show-arrows="hover" hide-delimiters class="relative">
        <v-carousel-item src="https://cdn.vuetifyjs.com/images/cards/docks.jpg" cover></v-carousel-item>
        <v-carousel-item src="https://cdn.vuetifyjs.com/images/cards/hotel.jpg" cover></v-carousel-item>
        <v-carousel-item src="https://cdn.vuetifyjs.com/images/cards/sunshine.jpg" cover></v-carousel-item>
      </v-carousel>
  
      <v-form class="absolute flex top-12 w-1/2 h-20 left-1/4 justify-center mt-6 rounded-full bg-white">
        <v-container class="absolute" fluid>
          <v-row>
            <v-col class="mb-2" cols="12" sm="6"> 
                <v-select
                density="compact"
                label="Kecamatan"
                variant="outlined"
                rounded="xl"
              ></v-select>
            </v-col>
  
            <v-col cols="12" sm="6">
                <v-select
                density="compact"
                label="Program"
                variant="outlined"
                rounded="xl"
              ></v-select>

            </v-col>
          </v-row>
        </v-container>
      </v-form>
    </SiteLayout>
  </template>
  
  <script>
  import SiteLayout from "@/Layouts/SiteLayout.vue";
  import { ref } from "vue";
  
  export default {
    components: {
      SiteLayout,
    },
    setup() {
      const show1 = ref(false);
      const show2 = ref(true);
 
      const password = ref("Password");

      const rules = {
        required: (value) => !!value || "Required.",
        min: (v) => v.length >= 8 || "Min 8 characters",
        emailMatch: () => `The email and password you entered don't match`,
      };
  
      return {
        show1,
        show2,
        password,
        rules,

      };
    },
  };
  </script>
  
  <style>
 

  </style>
  