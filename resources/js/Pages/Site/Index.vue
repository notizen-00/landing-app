<template>
    <SiteLayout>
    <template  #carousel>
      <template v-if="mobile">
        <v-carousel :show-arrows="false" show-delimiters height="200" width="100%">
          <v-carousel-item src="/img/kotabaru.png" cover height="250"></v-carousel-item>
          <v-carousel-item src="https://cdn.vuetifyjs.com/images/cards/hotel.jpg" cover height="250"></v-carousel-item>
          <v-carousel-item src="https://cdn.vuetifyjs.com/images/cards/sunshine.jpg" cover height="250"></v-carousel-item>
        </v-carousel>
   
      </template>
      <template v-else>
       
        <v-carousel show-arrows="hover" hide-delimiters rounded="xl" class="relative" >
          <v-carousel-item src="/img/carousel1.jpg" class="mt-2" cover></v-carousel-item>
          <v-carousel-item src="/img/carousel2.jpg" cover></v-carousel-item>
          <v-carousel-item src="/img/carousel3.jpg" cover></v-carousel-item>
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

      <v-form class="d-flex d-sm-none absolute flex top-12 w-10/12 h-12 ml-10 justify-center mt-5 rounded-full bg-white">
        <v-container class="absolute" fluid>
          <v-row>
            <v-col cols="3" sm="8" class="-mt-3"> 
              <v-menu>
                <template v-slot:activator="{ props }">
                  <v-btn icon="mdi-filter" size="x-small" class="mt-1" color="blue" v-bind="props"></v-btn>
                </template>
    
                <v-list>
                  <v-list-item @click="store.siteStore.setFilter('kecamatan')">
                    <v-list-item-title>Kecamatan</v-list-item-title>
                  </v-list-item>
                  <v-list-item @click="store.siteStore.setFilter('program')">
                    <v-list-item-title>Program</v-list-item-title>
                  </v-list-item>
                </v-list>
              </v-menu>
               
            </v-col>
  
            <v-col cols="9" class="-mt-2 -m-5">
              <select  v-if="getSelectedFilter === 'program'" class="border border-blue-500 w-full rounded-xl h-8 text-xs" >
                <option value="">Program</option>
               </select>

                <select clearable v-if="getSelectedFilter === 'kecamatan'" class="border border-blue-500 w-full rounded-xl h-8 text-xs appearance-none" >
                <option value="">Kecamatan</option>
                <option v-for="option in listKecamatan" v-bind:value="option.id">
                  {{ option.name }}
                </option>

                Filter
               </select>
            </v-col>
          </v-row>
        </v-container>
      </v-form>
        <div class="d-none d-sm-flex  w-2/3 mx-auto" >
          <v-card class="w-full absolute bottom-20 " style="border-top-left-radius:20px; border-bottom-left-radius:20px;" height="150" color="white">
            <img src="/img/icons/account-group.png" class="h-full w-22 absolute -z-10 -left-16" alt="Card Image" />
            <v-card-title class="text-blue-700 text-h2 text-center font-serif mt-8">
              0
            </v-card-title>
            <v-card-subtitle class="text-center mt-4 font-bold font-serif"> 
              Account Terdaftar
            </v-card-subtitle>
  
          </v-card>
          <v-card class="w-full absolute bottom-20 ml-1" height="150" color="white">
            <img src="/img/product.png" class="h-full w-22 absolute -z-10 -left-16" alt="Card Image" />
            <v-card-title class="text-blue-700 text-h2 text-center font-serif mt-8">
              0
            </v-card-title>
            <v-card-subtitle class="text-center mt-4 font-bold font-serif"> 
              Produk Mitra
            </v-card-subtitle>
  
          </v-card>
          <v-card class="w-full absolute bottom-20 ml-1" height="150" color="white">
            <img src="/img/icons/state.png" class="h-full w-22 absolute -z-10 -left-16" alt="Card Image" />
            <v-card-title class="text-blue-700 text-h2 text-center font-serif mt-8">
              21
            </v-card-title>
            <v-card-subtitle class="text-center mt-4 font-bold font-serif"> 
              Total Kecamatan
            </v-card-subtitle>
  
          </v-card>
          <v-card class="w-full absolute bottom-20 ml-1" style="border-top-right-radius:20px; border-bottom-right-radius:20px;" height="150" color="white">
            <img src="/img/icons/store.jpg" class="h-full w-22 absolute -z-10 -left-16" alt="Card Image" />
            <v-card-title class="text-blue-700 text-h2 text-center font-serif mt-8">
              0
            </v-card-title>
            <v-card-subtitle class="text-center mt-4 font-bold font-serif"> 
             Mitra Tervalidasi
            </v-card-subtitle>
  
          </v-card>

        </div>
    

    
    </template>

    <template #content v-if="mobile">
        <SectionTitle title="Informasi Website"/>

        <SectionOneMobile />

        <AboutSection  class="mt-4" />

        <SectionTitle title="List Mitra" class="mt-4"/>
        <MitraSection class="mt-4" />

        <SectionTitle title="Gallery" class="mt-4"/>
        <GallerySection class="mt-4"/>
        <SectionTitle title="Berita" class="mt-4"/>
        <BlogSection  />
        
    </template>
    <template #content v-else>

     

      <AboutSectionDesktops/>
      <!-- <SectionTitle title="List Mitra" class="mt-10"/> -->
      <MitraSectionDesktops class="mt-10"/>

      <GallerySectionDesktops class="mt-10"/>

        
    </template>

    </SiteLayout>
  </template>
  <script setup>
  import SiteLayout from "@/Layouts/SiteLayout.vue";
  import SectionOneMobile from '@/Components/Site/Mobile/SectionOnes.vue'
  import SectionTitle from '@/Components/SectionTitle.vue'
  import AboutSection from '@/Components/Site/Mobile/AboutSection.vue'
  import MitraSection from '@/Components/Site/Mobile/MitraSection.vue'
  import GallerySection from '@/Components/Site/Mobile/GallerySection.vue'
  import BlogSection from '@/Components/Site/Mobile/BlogSection.vue'
  import AboutSectionDesktops from '@/Components/Site/Desktop/AboutSections.vue'
  import MitraSectionDesktops from '@/Components/Site/Desktop/MitraSection.vue'
  import GallerySectionDesktops from "@/Components/Site/Desktop/GallerySection.vue";
  import { storeToRefs } from "pinia";
  import { ref,inject,onMounted,computed,watch } from "vue";
  import { useDisplay } from "vuetify";
  
  const { mobile } = useDisplay();
  const store = inject('store')

  const { listKecamatan } = storeToRefs(store.kecamatanStore)
  const { getSelectedFilter} = storeToRefs(store.siteStore)
 
  store.kecamatanStore.fetchKecamatan()
  store.siteStore.fetchMitra()


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
  