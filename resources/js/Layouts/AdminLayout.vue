<template>
  <Head :title="title"></Head>
    <div class="flex h-screen bg-gray-100 w">
    <aside class="bg-white shadow h-screen" :class="sidebarClasses">
        <Sidebar :isSidebarCollapsed="isSidebarCollapsed" @toggle-sidebar="toggleSidebar"/>
    
      </aside>

      <div class="flex flex-col flex-1 ml-2 w-5/6 " :class="mainContentClasses">

        <Navbar />
 
        <header v-if="$slots.header" class="bg-white shadow">
          <div class="mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <slot name="header" />
          </div>
        </header>
  
        <main class="overflow-y-scroll max-h-screen">
          <slot />
        </main>
      </div>
    </div>
  </template>
<script setup>
import { ref,computed,onMounted,inject } from 'vue';
import { Head, router } from '@inertiajs/vue3';
import Navbar from '@/Layouts/Partial/Admin/Navbar.vue';
import Sidebar from '@/Layouts/Partial/Admin/SideBar.vue';
import { faBars, faTimes } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';

defineProps({
    title: String,
});

const store = inject('store'); // Menggunakan store Vuex di dalam komponen
const isSidebarCollapsed = computed(() => store.overlay.isOverlayActive);
const toggleSidebar = () => store.overlay.toggleOverlay();

const sidebarClasses = computed(() => {
  return {
    'w-15': !isSidebarCollapsed.value,
    'w-0 ': isSidebarCollapsed.value,
    'bg-white': true,
    'shadow': true,
    'transition-[width] duration-700': true
  };
});
const mainContentClasses = computed(() => {
  return {
    'flex': true,
    'h-screen': true,
    'bg-gray-100': true,
    'w-full': isSidebarCollapsed.value,
    'w-0': !isSidebarCollapsed.value,
    'transition-[width] duration-700 ease-in-out':true
  };
});




const logout = () => {
    router.post(route('logout'));
};

onMounted(() => {
  // Listen for the event emitted by Sidebar
  // to toggle the sidebar's collapsed state
  // When the sidebar state changes, you can adjust the width of the main content area as needed
});

const icons = {
  bars: faBars,
  times: faTimes
};
</script>


  
  
  
  
  
