<template>
  <v-card class="w-full  absolute h-80 -bottom-8 -left-6 z-50 bg-grey-lighten-3 rounded-b-xl" >
        
    <div class="w-full d-flex justify-between">
    <div class="d-flex w-1/2 m-20">
   
        <v-img max-width="150" src="/img/footer1.webp" class=""/>
  
        <v-img max-width="350" src="/img/footer2.webp" class="ml-10" />

    </div>

    <div class="w-1/2 m-20">
        
        <p class="text-h6 w-full">
            Direktorat Infrastruktur Ekonomi Kreatif

        Deputi Bidang Pengembangan Destinasi dan Infrastruktur
        
        Kementerian Pariwisata dan Ekonomi Kreatif / Badan Pariwisata dan Ekonomi Kreatif

        </p>

        <div class="w-full d-flex justify-between">
            <div class="line-clamp-2 mt-10 text-sm">
                Gedung Sapta Pesona Jalan Medan Merdeka Barat No.17 Jakarta 10110
                <br>
                Email : katakreatif@kemenparekraf.go.id
            </div>
            <div class="line-clamp-2 mt-10 ">
                <v-btn
                color="green"
                  icon="mdi-whatsapp"
                  class="mr-3"
                >

                </v-btn>
                <v-btn
                color="pink"
                icon="mdi-instagram"
              >

              </v-btn>
              <v-btn
              color="blue"
              icon="mdi-facebook"
              class="ml-3"
            >

            </v-btn>
            </div>
        </div>
        
    </div>

    </div>
  </v-card>

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