<template>
    <SiteLayout>

    
      
        <template #carousel>
            <HeaderDetailMobiles />
        </template>

    <template #content v-if="mobile" >
        <v-container class="bg-white">
            <v-card
            color="black"
            variant="outlined"

            >
            <div class="text-h6 m-3 text-slate-600">
                {{ detail.judul  }}
            </div>
          
                <v-card-subtitle class="d-flex justify-between">
                    <div>
                      <span class="me-1">{{ detail.author }} </span>
                
                      <v-icon
                        color="error"
                        icon="mdi-account"
                        size="small"
                      ></v-icon>
                    </div>
                    <div>
                      <span class="me-1">{{ detail.created_at }} </span>
                      <v-icon
                      color="info"
                      icon="mdi-calendar-clock"
                      size="small"
                    ></v-icon>
                    </div>
                </v-card-subtitle>
            </v-card>
            <v-sheet class="w-full overflow-auto" v-html="detail.konten">

            </v-sheet>
        </v-container>
        
        
    </template>
    <template #content v-else >

    </template>

    </SiteLayout>
  
</template>
<script setup>
import SiteLayout from '@/Layouts/SiteLayout.vue'
import HeaderDetailMobiles from '@/Components/Site/Mobile/Partial/DetailBlogHeaders.vue'

import { storeToRefs } from "pinia";
  import { ref,inject,onMounted,computed,watch } from "vue";
  import { useDisplay } from "vuetify";
  
  const { mobile } = useDisplay()
defineProps({
    detail:Object
})


</script>