<template>
  <!-- <div class="d-none d-sm-flex  absolute bottom-0 h-14 z-50" style="background-color:#162640">
    
    <div class="px-4 py-5 md:bg-blue-900 text-center sm:bg-blue-300 w-100">
       <span class="text-slate-200"> © {{ new Date().getFullYear() }} </span> <strong class="text-slate-200">Kementerian Pariwisata dan Ekonomi Kreatif/Badan Pariwisata dan Ekonomi Kreatif, Republik Indonesia</strong>
    </div>

  </div>  -->

  

  <v-footer app class="d-flex d-sm-none">
    <div class="px-4 py-5 md:bg-blue-900 text-center sm:bg-blue-300 w-100">
     <span class="text-slate-200"> © {{ new Date().getFullYear() }} </span> <strong class="text-slate-200">Kementerian Pariwisata dan Ekonomi Kreatif/Badan Pariwisata dan Ekonomi Kreatif, Republik Indonesia</strong>
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