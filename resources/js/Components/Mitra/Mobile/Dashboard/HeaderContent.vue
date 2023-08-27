<template>

    <v-col col="12">


        <v-sheet
        elevation="0"
        rounded="lg"
        width="100%"
        color="white"
        class="pa-4 bg-blue-500/50 text-center rounded-t-xl mx-auto"
        >
        <v-row>
            <v-col cols="4">
                <v-avatar
                class="mb-5 border-2 "
                color="primary"
                size="80"
                >{{ $page.props.auth.user.name.substr(0,3) }}</v-avatar>
            </v-col>
            <v-col cols="8 my-auto">
                <h2 class="text-h5 max-h-1 w-full inline-block mb-6 text-start">Hi , {{ $page.props.auth.user.name }}</h2>
                <br>
                <Status :case_number="$page.props.status_mitra" />
            </v-col>
        </v-row>

        <p class="mb-4 text-start text-slate-900 text-body-3">
            Selamat Datang di Aplikasi <i>GO-UMKM</i> <br>
            <span class="text-slate-600 text-small">lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et</span>
        </p>
        <br>

        <v-divider class="mb-4 border-opacity-50" :thickness="4" color="info"></v-divider>

            <div class="text-end">
              
            </div>
        </v-sheet>
                
    </v-col>
</template>
<script setup>

import Status from "@/Components/Mitra/Mobile/Partial/Status.vue"

</script>