<template>
    <v-row justify="center">
      <v-dialog
        v-model="localDialog"
        fullscreen
        :scrim="false"
        transition="dialog-bottom-transition"
      >
     
        <v-card>
          <v-toolbar
            dark
            color="primary"
          >
            <v-btn
              icon
              dark
              @click="localDialog = false"
            >
              <v-icon>mdi-close</v-icon>
            </v-btn>
            <v-toolbar-title>Settings</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-toolbar-items>
              <v-btn
                variant="text"
                @click="dialog = false"
              >
                Save
              </v-btn>
            </v-toolbar-items>
          </v-toolbar>
          <v-list
            lines="two"
            subheader
          >
            <v-list-subheader>User Controls</v-list-subheader>
            <v-list-item title="Content filtering" subtitle="Set the content filtering level to restrict apps that can be downloaded"></v-list-item>
            <v-list-item title="Password" subtitle="Require password for purchase or use password to restrict purchase"></v-list-item>
          </v-list>
          <v-divider></v-divider>
       
           
        </v-card>
      </v-dialog>
    </v-row>
  </template>
  <script setup>
  import { ref,watch } from 'vue'
   const props = defineProps({
       dialog:{
            type:Boolean,
            default:false,
       }
    })  
    // Create a local ref for dialog
const localDialog = ref(props.dialog);

// Watch for changes in props.dialog
watch(() => props.dialog, (newValue) => {
  localDialog.value = newValue;
});

    
  </script>