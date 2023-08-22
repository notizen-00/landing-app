<script setup>
    import SiteLayout from "@/Layouts/SiteLayout.vue"

</script>

<template>
    <SiteLayout>
        
        <v-carousel show-arrows="hover"  hide-delimiters class="relative overflow-visible">
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

          
                <v-text-field
                label="Ketikan Sesuatu ..."
                prepend-inner-icon="mdi-magnify"
                variant="outlined"
                class="absolute -bottom-10 left-1/4 right-1/4  z-50 bg-white rounded-md"
              ></v-text-field>
             
          </v-carousel>

    </SiteLayout>

</template>
