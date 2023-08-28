<template>

    <v-col col="12">


        <v-sheet
        elevation="0"
        rounded="lg"
        width="100%"
        color="white"
        class="pa-4 bg-blue-500/50 text-center rounded-t-xl mx-auto h-full mb-10"
        >
        <v-row>
            <v-col cols="4">
                <v-avatar
                class="mb-5 border-2 text-slate-500"
                color="yellow"
                size="80"
                >{{ $page.props.auth.user.name.substr(0,3) }}</v-avatar>
            </v-col>
            <v-col cols="8 my-auto">
                <h2 class="text-h5 max-h-1 w-full inline-block mb-6 text-start">Hi , {{ $page.props.auth.user.name }}</h2>
                <br>
                <Status :case_number="$page.props.status_mitra" />
            </v-col>
        </v-row>


        <v-img
        class="mx-auto relative"
         height="300"
        lazy-src="/img/dashboard.jpg"
        max-width="500"
        src="/img/dashboard.jpga"

        >
        <template v-slot:placeholder>
            <div class="bottom-0 absolute ">
            <v-btn
            color="blue-lighten-1"
            class="text-white w-full items-center justify-center left-2/3"
            variant="outlined"
             prepend-icon="mdi-arrow-down"
             @click="scrollTo()"
            >
                Lihat Detail
            </v-btn>
            </div>
          
        </template>
        </v-img>
        <p class="mb-4 text-start text-slate-900 text-body-3">
        
        </p>
        <br>

        <v-divider class="mb-4 border-opacity-50" :thickness="4" color="info"></v-divider>

            <div class="text-center">
              
            <div ref="target" class="z-50 mt-20">
                Selamat Datang di Aplikasi <i>GO-UMKM</i> <br>
                <span class="text-slate-600 text-small">lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et</span>
                
            </div>
            </div>
        </v-sheet>

                
    </v-col>
</template>
<script setup>
import { ref } from 'vue'
import Status from "@/Components/Mitra/Mobile/Partial/Status.vue"

const target = ref(null)

const scrollTo = () =>{
    if (target.value) {
    target.value.scrollIntoView({ behavior: "smooth" });
  }


}

</script>