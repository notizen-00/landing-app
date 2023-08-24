<template>
    <MobileLayout>      
        <Notification/>
        <slot></slot>
    </MobileLayout>
</template>

<script setup>

import MobileLayout from '@/Layouts/Partial/Mitra/Mobile/MobileLayout.vue';
import Notification from '@/App/Mitra/Components/Notification.vue';

</script>