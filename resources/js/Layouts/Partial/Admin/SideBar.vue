<script setup>
import { ref, defineProps, computed,inject } from 'vue';
import { faBars, faTimes,faSignOut,faDashboard,faInbox,faClipboard,faLayerGroup,faUserGear,faMoneyCheck,faCog } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { Head, Link, router } from '@inertiajs/vue3';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLinkSidebar from '@/Components/NavLinkSidebar.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';


const props = defineProps({
  isSidebarCollapsed: Boolean
});

const store = inject('store');
const isSidebarCollapsed = computed(() => store.overlay.isOverlayActive);
const toggleSidebar = () => store.overlay.toggleOverlay();

const icons = {
  bars: faBars,
  times: faTimes,
  signout: faSignOut,
  dashboard: faDashboard,
  inbox:faInbox,
  clipboard:faClipboard,
  layergroup:faLayerGroup,
  usergear:faUserGear,
  money:faMoneyCheck,
  cog:faCog,
};

  const isDropdownOpen = ref(false);

  const toggleDropdown = (event) => {
    event.preventDefault();
    alert('hi');
    isDropdownOpen.value = !isDropdownOpen.value;
    console.log(isDropdownOpen);
  };


</script>

<template>
  <div class="">
    <!-- Sidebar -->
    <aside
      :class="{'hidden': isSidebarCollapsed, 'h-screen': !isSidebarCollapsed}"
      class="bg-white shadow border right-3 ring-offset-2 border-slate-600"
    >
      <!-- Sidebar Logo -->
      <div class="p-4 bg-gray-100 text-center">
        <!-- <img src="/public/" alt="Logo" class="w-16 h-16 mx-auto"> -->
        <AuthenticationCardLogo />
        <h1 class="text-xl font-semibold mt-2">Sistem Informasi</h1>
      </div>

      <!-- Sidebar Items -->
      <ul class="mt-4 space-y-2">
        <li>
           <NavLinkSidebar :href="route('dashboard')" :active="route().current('dashboard')">
            <span class="h-6 w-8 text-slate-400"><font-awesome-icon :icon="icons.dashboard"/></span>
                Dashboard
           </NavLinkSidebar>
        </li>
        <li>
            <NavLinkSidebar :href="route('admin_mitra.index')" :active="route().current('admin_mitra.index')">
             <span class="h-6 w-8 text-slate-400"><font-awesome-icon :icon="icons.inbox"/></span>
                 Mitra
            </NavLinkSidebar>
         </li>

         <li>
            
          <NavLinkSidebar :href="route('admin_program.index')" :active="route().current('admin_program.index')">
           <span class="h-6 w-8 text-slate-400"><font-awesome-icon :icon="icons.money"/></span>
               Program
          </NavLinkSidebar>
       </li>
       <li>
            
            <NavLinkSidebar :href="route('admin_blog.index')" :active="route().current('admin_blog.index')">
             <span class="h-6 w-8 text-slate-400"><font-awesome-icon :icon="icons.layergroup"/></span>
                Blog
            </NavLinkSidebar>
          
         </li>
         <li>
            <NavLinkSidebar :href="route('admin_pengaturan.index')" :active="route().current('admin_pengaturan.index')">
             <span class="h-6 w-8 text-slate-400"><font-awesome-icon :icon="icons.usergear"/></span>
                Pengaturan
            </NavLinkSidebar>
         </li>     
      </ul>
    </aside>

    <!-- Rest of the page content -->
    <slot></slot>
  </div>
</template>
