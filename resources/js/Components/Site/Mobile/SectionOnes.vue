<template>
  <div class="">
    <v-timeline side="end" density="compact">
      <v-timeline-item min-width="100%"  dot-color="blue"  size="large">
       <template v-slot:icon >
         
        </template> 
       
        <v-card class="elevation-2 rounded-xl relative">
          <img src="/img/icons/account-group.png" class="h-full w-20 absolute -z-10 -left-5" alt="Card Image" />
          <v-card-title class="text-h4">
            <h6 class="text-large text-center text-blue-800 font-bold">14</h6>
          </v-card-title>
          <v-card-text class="text-center text-slate-400">
            Account Terdaftar
          </v-card-text>
        </v-card>
      </v-timeline-item>
      <v-timeline-item min-width="100%"  dot-color="yellow" density="compact" size="large">
        <template v-slot:icon >
      
        </template>
       
        <v-card class="elevation-2 rounded-xl relative">
          <img src="/img/product.png" class="h-full w-20 absolute -z-10 -left-7" alt="Card Image" />
          <v-card-title class="text-h4">
            <h6 class="text-large text-center text-blue-800 font-bold">50</h6>
          </v-card-title>
          <v-card-text class="text-center text-slate-400">
            Produk Mitra
          </v-card-text>
        </v-card>
      </v-timeline-item>

      <v-timeline-item min-width="100%" dot-color="blue"  size="large">
        <template v-slot:icon >
          
        </template>
        <template v-slot:opposite>
          <span>Tus eu perfecto</span>
        </template>
        <v-card class="elevation-2 rounded-xl relative">
          <img src="/img/icons/state.png" class="h-full w-20 absolute -z-10 -left-7" alt="Card Image" />
          <v-card-title class="text-h4">
            <h6 class="text-large text-center text-blue-800 font-bold">21</h6>
          </v-card-title>
          <v-card-text class="text-center text-slate-400">
            Total Kecamatan
          </v-card-text>
        </v-card>
      </v-timeline-item>

      <v-timeline-item min-width="100%" dot-color="yellow"  size="large">
        <template v-slot:icon >
    
        </template>
       
        <v-card class="elevation-2 rounded-xl relative">
          <img src="/img/icons/store.jpg" class="h-full w-20 absolute -z-10 -left-5" alt="Card Image" />
          <v-card-title class="text-h4">
            <h6 class="text-large text-center text-blue-800 font-bold">13</h6>
          </v-card-title>
          <v-card-text class="text-center text-slate-400">
            Mitra Tervalidasi
          </v-card-text>
        </v-card>
      </v-timeline-item>
    </v-timeline>
</div>
</template>

<script>
  export default {
    data: () => ({
      items: [
        {
          id:1,
          color: 'red-lighten-2',
          icon: 'mdi-star',
          text: 'Akun Terdaftar '
        },
        {
          id:2,
          color: 'purple-lighten-2',
          icon: 'mdi-book-variant',
          text: 'Kecamatan Terdaftar  '
        },
        {
          id:3,
          color: 'green-lighten-1',
          icon: 'mdi-airballoon',
          text: 'Mitra Terdaftar'
        },
        {
          id:4,
          color: 'indigo-lighten-2',
          icon: 'mdi-layers-triple',
          text: 'Produk Terupload'
        },
      ],
    }),
  }
</script>

