<template>
    <AdminLayout>
      <ckeditor :editor="editor" v-model="editorData" :config="editorConfig"></ckeditor>
    </AdminLayout>
  </template>
  
  <script setup>
  import { ref } from 'vue'
  import ClassicEditor from '@ckeditor/ckeditor5-build-classic'
  import AdminLayout from '@/Layouts/AdminLayout.vue'
  
  const editor = ClassicEditor
  const editorData = ref('<p>Content of the editor.</p>')
  const editorConfig = ref({
    // Konfigurasi editor
    
    // ... konfigurasi lainnya ...
  })
  
  // Ekspor variabel yang dibutuhkan
  const exports = {
    editor,
    editorData,
    editorConfig
  }
  </script>

  