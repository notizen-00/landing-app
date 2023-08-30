<template>
    <div>
        <v-card
        class="mx-auto rounded-t-xl"
        max-width="100%"
      >
        <v-img
          class="align-end text-white"
          height="200"
          src="https://cdn.vuetifyjs.com/images/cards/docks.jpg"
          cover
        >
          <v-card-title class="text-center">Tentang Aplikasi 
            <v-divider
            inset
            :thickness="5"
            class="border-opacity-100 border-3 mx-auto border-yellow-400"
            color="warning"
            ></v-divider></v-card-title>
        </v-img>
    
        <v-card-text class="d-flex justify-center text-start text-slate-500">
    
          <div>
            Lorem Ipsum si amit dolor de Lorem Ipsum si amit dolor de  Lorem Ipsum si amit dolor de Lorem Ipsum si amit dolor de Lorem Ipsum si amit dolor de 
          </div>
        </v-card-text>
    
        <v-card-actions>
          <v-btn color="orange" block>
            Selengkapnya
          </v-btn>
        </v-card-actions>
      </v-card>

    </div>
</template>
<script setup>

</script>