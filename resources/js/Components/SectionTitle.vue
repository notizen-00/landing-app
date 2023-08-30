<template>
    <div class="md:col-span-1 flex justify-center h-11 bg-slate-100 rounded-xl mb-2">
        <div class="px-4 sm:px-0">
            <h1 class="text-h6 text-center font-bold text-gray-900">
               -- {{ title }} --
            </h1>
            <v-divider
            :thickness="5"
            class="border-opacity-100 border-3 border-yellow-400"
            color="warning"
            ></v-divider>
        </div>
       

    </div>
</template>
<script setup>
    defineProps({
        title:String
    })
</script>
<style>
.theme--light.v-divider {
    border-color:  red !important; 
}
</style>