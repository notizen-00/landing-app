<script setup>
    import SiteLayout from "@/Layouts/SiteLayout.vue"

</script>

<template>
    <SiteLayout>
        <v-carousel show-arrows="hover" hide-delimiters class="relative">
            <v-carousel-item
              src="https://cdn.vuetifyjs.com/images/cards/docks.jpg"
                cover
            ></v-carousel-item>
          
            <v-carousel-item
              src="https://cdn.vuetifyjs.com/images/cards/hotel.jpg"
                cover              
            ></v-carousel-item>
          
            <v-carousel-item
              src="https://cdn.vuetifyjs.com/images/cards/sunshine.jpg"
            cover
            ></v-carousel-item>

<!-- 
             

              <v-text-field
              label="Kecamatan"
              prepend-inner-icon="mdi-magnify"
              variant="outlined"
              class="absolute top-1 right-0 w-1/2 bg-transparent  z-50"
            ></v-text-field> -->

            <div class="absolute flex w-1/2 h-12 left-1/4 justify-center mt-2 rounded-full bg-slate-100">
              <div class="w-1/4 h-3 bg-slate-500">  
                <v-text-field solo
                  variant="filled"
                  class="h-3"
                >
                    
              </v-text-field>
            </div>
              <div class="w-1/4">
                <v-text-field
                label="Subsektor"
                prepend-inner-icon="mdi-magnify"
                variant="outlined"
                class="bg-transparent mt-3  z-50"
              ></v-text-field>
              </div>
              
              <div class="w-1/4">
                  <v-text-field
                  label="Kecamatan"
                  prepend-inner-icon="mdi-magnify"
                  variant="outlined"
                  class="bg-transparent mt-3 z-50"
                ></v-text-field>
              </div>
            </div>
             
             
          </v-carousel>

    </SiteLayout>

</template>
<style scoped>
.v-text-field .v-input__control .v-input__slot {
  min-height: auto !important;
  display: flex !important;
  align-items: center !important;
}

</style>