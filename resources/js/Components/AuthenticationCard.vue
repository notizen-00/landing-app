<template>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
      <div>
        <slot name="logo" />
      </div>
  
      <div :class="['w-full', 'sm:max-w-md', 'mt-6', classes, 'bg-white', 'shadow-md', 'overflow-hidden', 'sm:rounded-lg']">
        <slot />
      </div>
    </div>
  </template>
  
  <script setup>
  import { defineProps } from 'vue';
  
  const props = defineProps({
    classes: {
      type: String,
      default: "px-6 py-4",
    },
  });
  </script>
  