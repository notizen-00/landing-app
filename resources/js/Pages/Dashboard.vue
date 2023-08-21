<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <Welcome />

                    <div class="text-center">
                        <v-chip
                          class="ma-2"
                          color="success"
                          variant="outlined"
                        >
                          <v-icon start icon="mdi-server-plus"></v-icon>
                          Server Status
                        </v-chip>
                    
                        <v-chip
                          class="ma-2"
                          color="primary"
                          variant="outlined"
                        >
                          User Account
                          <v-icon end icon="mdi-account-outline"></v-icon>
                        </v-chip>
                      </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
