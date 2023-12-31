import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import 'vuetify/styles'
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'
import { VStepper } from 'vuetify/labs/VStepper'
import { VDataTable } from 'vuetify/labs/VDataTable'
import { VBottomSheet } from 'vuetify/labs/VBottomSheet'

import '@mdi/font/css/materialdesignicons.css'
import { pinia } from './Store/pinia'
import { useStore } from '@/Store/modules'



const vuetify = createVuetify({
    components: {
        ...components,
        VStepper,
        VDataTable,
        VBottomSheet
      },
    directives,
    icons: {
        defaultSet: 'mdi', // This is already the default value - only for display purposes
      },
  })


const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .use(vuetify)
            .use(pinia)
            .provide('store', useStore())
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
