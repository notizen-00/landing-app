<template>
    <v-dialog v-model="computedDialog" class="w-full md:w-1/2">
      <v-card>
        <v-card-text>
            <div>
                <v-card-actions>
                    <v-btn color="primary" class="ml-auto" @click="closeDialog" prepend-icon="mdi-close" size="large"></v-btn>
                  </v-card-actions>

                  <LoginForms v-if="changeForms"/>

                  <RegisterForms v-if="!changeForms" />
                  
                  <v-card-actions>
                    <v-btn color="blue" class="ml-auto" @click="toggleChangeForms" append-icon="mdi-arrow-right" :text="changeForms ? 'Daftar Disini' : 'login disini'" size="small">
                        
                    </v-btn>
                  </v-card-actions>
            </div>
        </v-card-text>
     
      </v-card>
    </v-dialog>
  </template>
  
  <script setup>
  import { defineProps, computed,ref } from 'vue';
  import LoginForms from '@/Pages/Auth/LoginForms.vue';
  import RegisterForms from '@/Pages/Auth/RegisterForms.vue';
  
  const props = defineProps({
    dialog: Boolean,
    visible:Boolean,
  });
  
  const computedDialog = computed(() => props.dialog);
  const changeForms = ref(true);

  const toggleChangeForms = () =>{

    changeForms.value = !changeForms.value 
  }
  const emit = defineEmits(['update-dialog'])
  
  const closeDialog = () => {
    emit('update-dialog', false);
  };
  </script>
  