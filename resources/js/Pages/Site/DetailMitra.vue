<template>
    <SiteLayout>

        <template #carousel>
            <HeaderDetailMobile />
        </template>

        <template #content v-if="mobile">
            <v-card>

                <v-card-item>
                    <v-card-title class="text-slate-600">{{ getDetailMitra.program.nama_program }}</v-card-title>

                    <v-card-subtitle>
                        <v-icon color="error" icon="mdi-sign-real-estate" size="small"></v-icon>
                        <span class="me-1 ml-1">{{ getDetailMitra.nama_kecamatan }}</span><br>



                    </v-card-subtitle>

                    <v-timeline side="end">
                        <v-timeline-item width="300" v-for="item in items" :key="item.id" :dot-color="item.color"
                            size="small">
                            <v-card class="elevation-2 rounded-xl relative">
                                <img :src="item.image" class="h-full absolute -z-10 -left-5" alt="Card Image" />
                                <v-card-title class="text-h4">
                                    <h6 class="text-large text-center text-blue-800 font-bold">
                                        <v-btn :icon="item.icon"></v-btn>
                                    </h6>
                                </v-card-title>
                                <v-card-text class="text-center text-slate-400">
                                    {{ item.subtitle }}
                                </v-card-text>
                            </v-card>
                        </v-timeline-item>
                    </v-timeline>
                </v-card-item>
                <v-card-text class="d-flex justify-center text-center text-slate-500">

                    <div class="p-4 italic border-l-4 bg-neutral-100 text-neutral-600 border-neutral-500 quote">
                        " {{ getDetailMitra.deskripsi_usaha }} "
                    </div>
                </v-card-text>

                <v-card-actions>
                    <v-btn color="orange" block>
                        Selengkapnya
                    </v-btn>
                </v-card-actions>
            </v-card>

            <ListProduk />

        </template>
        <template #content v-else>

            <v-card>
                <v-card-item>
                    <v-card-title class="text-slate-600">{{ getDetailMitra.program.nama_program }}</v-card-title>

                    <v-card-subtitle>
                        <v-icon color="error" icon="mdi-sign-real-estate" size="small"></v-icon>
                        <span class="me-1 ml-1">{{ getDetailMitra.nama_kecamatan }}</span><br>



                    </v-card-subtitle>

                    <v-timeline side="end">
                        <v-timeline-item width="900" v-for="item in items" :key="item.id" :dot-color="item.color"
                            size="small">
                            <v-card class="elevation-2 rounded-xl relative" height="200">
                                <img :src="item.image" class="h-full absolute -left-5" alt="Card Image" />
                                <v-card-title class="text-h4 mt-10">
                                    <h6 class="text-large text-center text-blue-800 font-bold">
                                        <v-btn :icon="item.icon"></v-btn>
                                    </h6>
                                </v-card-title>
                                <v-card-text class="text-center text-h5 pt-10 text-slate-400">
                                    {{ item.subtitle }}
                                </v-card-text>
                            </v-card>
                        </v-timeline-item>
                    </v-timeline>
                </v-card-item>
                <v-card-text class="d-flex justify-center text-center  text-slate-500">

                    <div class="p-4 italic border-l-4 text-xl bg-neutral-100 text-neutral-600 border-neutral-500 quote">
                        " {{ getDetailMitra.deskripsi_usaha }} "
                    </div>
                </v-card-text>

                <v-card-actions>
                    <v-btn color="orange" block>
                        ......
                    </v-btn>
                </v-card-actions>
            </v-card>

            <ListProdukDesktop />

        </template>
    </SiteLayout>
</template>
<script setup>
    import SiteLayout from "@/Layouts/SiteLayout.vue";
    import HeaderDetailMobile from '@/Components/Site/Mobile/Partial/DetailMitraHeader.vue'
    import ListProdukDesktop from '@/Components/Site/Desktop/Partial/ListProduk.vue'
    import ListProduk from '@/Components/Site/Mobile/Partial/ListProdukMitra.vue'

    import {
        storeToRefs
    } from "pinia";
    import {
        ref,
        inject,
        onMounted,
        computed,
        watch
    } from "vue";
    import {
        useDisplay
    } from "vuetify";

    const {
        mobile
    } = useDisplay()
    const store = inject('store')

    const {
        getDetailMitra
    } = storeToRefs(store.siteStore)


    const items = [{
            id: 1,
            color: 'info',
            icon: 'mdi-map-marker',
            image: '/img/map.png',
            title: 'https://www.google.com/maps/search/' + getDetailMitra.value.alamat_usaha,
            subtitle: getDetailMitra.value.alamat_usaha
        },
        {
            id: 2,
            color: 'error',
            icon: 'mdi-alert-circle',
            image: '/img/product.png',
            title: '21',
            subtitle: 'Total Produk'
        },
    ]

</script>
