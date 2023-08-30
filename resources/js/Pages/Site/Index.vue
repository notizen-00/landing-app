<template>
    <SiteLayout>

      <template v-if="mobile">
        <v-carousel :show-arrows="false" show-delimiters height="200">
          <v-carousel-item src="/img/kotabaru.png" cover height="250"></v-carousel-item>
          <v-carousel-item src="https://cdn.vuetifyjs.com/images/cards/hotel.jpg" cover height="250"></v-carousel-item>
          <v-carousel-item src="https://cdn.vuetifyjs.com/images/cards/sunshine.jpg" cover height="250"></v-carousel-item>
        </v-carousel>
   
      </template>
      <template v-else>
       
        <v-carousel show-arrows="hover" hide-delimiters class="relative">
          <v-carousel-item src="/img/kotabaru1.webp" cover></v-carousel-item>
          <v-carousel-item src="https://cdn.vuetifyjs.com/images/cards/hotel.jpg" cover></v-carousel-item>
          <v-carousel-item src="https://cdn.vuetifyjs.com/images/cards/sunshine.jpg" cover></v-carousel-item>
      </v-carousel>

      </template>
    
  

      <v-form class="d-none d-sm-flex absolute flex top-12 w-1/2 h-20 left-1/4 justify-center mt-6 rounded-full bg-white">
        <v-container class="absolute" fluid>
          <v-row>
            <v-col class="mb-2" cols="12" sm="6"> 
                <v-select
                density="compact"
                label="Kecamatan"
                variant="outlined"
                rounded="xl"
                :items="listKecamatan"
                item-title="name"
                item-value="id"
                clearable
              >
         
              </v-select>
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

      <v-form class="d-flex d-sm-none absolute flex top-12 w-10/12 h-14 justify-center mt-9 rounded-full bg-white">
        <v-container class="absolute" fluid>
          <v-row>
            <v-col cols="6" sm="6"> 
               <select class="border border-blue-500 w-full -mt-10 rounded-xl h-8 text-xs appearance-none" >
                <option v-for="option in listKecamatan" v-bind:value="option.id">
                  {{ option.name }}
                </option>
               </select>
            </v-col>
  
            <v-col cols="6" sm="6">
              <select class="border border-blue-500 w-full -mt-10 rounded-xl h-8 text-xs" >
                <option value="">Program</option>
               </select>
            </v-col>
          </v-row>
        </v-container>
      </v-form>


    </SiteLayout>
  </template>
  <script setup>
  import SiteLayout from "@/Layouts/SiteLayout.vue";
  import { storeToRefs } from "pinia";
  import { ref,inject,onMounted,computed,watch } from "vue";
  import { useDisplay } from "vuetify";
  
  const { mobile } = useDisplay();
  const store = inject('store')

  const { listKecamatan } = storeToRefs(store.kecamatanStore)

  store.kecamatanStore.fetchKecamatan()


  const show1 = ref(false);
  const show2 = ref(true);
  const password = ref("Password");
  
  const rules = {
    required: (value) => !!value || "Required.",
    min: (v) => v.length >= 8 || "Min 8 characters",
    emailMatch: () => `The email and password you entered don't match`,
  };


  </script>
  
  
  <style>
 

  </style>
  