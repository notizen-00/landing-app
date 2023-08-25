<script setup>
import { ref } from 'vue';
import { Head, Link, router ,usePage} from '@inertiajs/vue3';

import AdminLayout from '@/Layouts/AdminLayout.vue';
import MitraLayout from '@/Layouts/MitraLayout.vue';
defineProps({
    title: String,
});

</script>

<template>
    <div>
        <Head :title="title" />

        <AdminLayout v-if="$page.props.auth.user.role_id == 1"/>
        
        <MitraLayout v-if="$page.props.auth.user.role_id == 2"/>
    
    </div>
</template>
