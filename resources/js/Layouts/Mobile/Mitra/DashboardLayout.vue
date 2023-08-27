<template>
<MobileLayout>  
    <v-container class="relative bg-blue-100 rounded-t-xl h-full">
      <v-row>

      <header-content></header-content>
      
      </v-row>
      <v-row>
        <v-col col="12">
            <!-- <slide-card></slide-card> -->
        </v-col>
      </v-row>
      <content/>

    </v-container>
  
</MobileLayout>
</template>
<script setup>
    import MobileLayout from '@/Layouts/Partial/Mitra/Mobile/MobileLayout.vue';
    import HeaderContent from '@/Components/Mitra/Mobile/Dashboard/HeaderContent.vue';
    import SlideCard from '@/Components/Mitra/Mobile/Dashboard/SlideCard.vue';
    import Content from '@/Components/Mitra/Mobile/Dashboard/Content.vue';
</script>