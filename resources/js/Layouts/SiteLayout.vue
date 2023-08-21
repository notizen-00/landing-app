<template>
    <v-layout ref="app" class="rounded-md">
      <v-app-bar color="grey-lighten-2" name="app-bar">
        <child v-slot="{ print }">
          <v-btn class="mx-auto" @click="print('app-bar')">Get data</v-btn>
        </child>
      </v-app-bar>
  
      <v-navigation-drawer
        color="grey-darken-2"
        permanent
        name="drawer"
      >
        <div class="d-flex justify-center align-center h-100">
          <child v-slot="{ print }">
            <v-btn @click="print('drawer')">Get data</v-btn>
          </child>
        </div>
      </v-navigation-drawer>
  
      <v-main class="d-flex align-center justify-center" style="min-height: 300px;">
        Main Content
      </v-main>
  
      <v-footer
        app
        name="footer"
      >
        <v-btn
          class="mx-auto"
          variant="text"
         
        >
          Get data
        </v-btn>
      </v-footer>
    </v-layout>
  </template>