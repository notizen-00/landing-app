<template>
  <v-footer app class="d-sm-flex flex-column d-md-flex-column bg-black">
    <div class="bg-purple-500 d-sm-flex d-md-flex w-100 align-center d-none d-sm-flex px-4">
      <strong class="text-sm md:text-lg">Kementerian Pariwisata dan Ekonomi Kreatif/Badan Pariwisata dan Ekonomi Kreatif, Republik Indonesia</strong>

      <v-spacer></v-spacer>
     
      <div class="d-flex justify-center">

        <v-btn
        v-for="icon in icons"
        :key="icon"
        class="mx-4"
        :icon="icon"
        variant="plain"
        size="small"
      ></v-btn>
      </div>
      
    </div>

    <div class="px-4 py-2 md:bg-black text-center sm:bg-blue-300 w-100">
        © {{ new Date().getFullYear() }} <strong class="text-blue-300">Landing-App</strong>
    </div>
  </v-footer> 
</template>

  
  <script>
  export default {
    data: () => ({
      icons: [
        'mdi-facebook',
        'mdi-twitter',
        'mdi-linkedin',
        'mdi-instagram',
      ],
    }),
  }
</script>