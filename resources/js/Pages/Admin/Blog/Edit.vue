<template>

 
    <admin-layout>
      <v-container class="bg-white">
        <QuillEditor ref="quillEditor" class="h-full bg-white" :modules="modules" toolbar="full" >
          <template #toolbar>
            <div id="full">
              <div class="w-full d-flex justify-end">
  
                <v-btn
                append-icon="mdi-content-save-all"
                class="m-2"
                @click="SimpanBerita"
                color="blue"
               >
              Update
              </v-btn>
              </div>
              <div class="w-full justify-start">
                <v-text-field
                label="Judul berita"
                class="m-2"
                v-model="form.judul"
                >
                </v-text-field>
                <v-text-field
                label="Author"
                readonly
                v-model="form.author"
                class="m-2 cursor-not-allowed">
    
                </v-text-field>
                <v-textarea
                class="m-2"
                v-model="form.deskripsi"
                label="Deskripsi Berita">
                </v-textarea>
  
              </div>
             
            
            </div>
          </template>
        </QuillEditor>
  
      </v-container>
    </admin-layout>
  </template>
  
  <script>
  import { ref, defineComponent,onMounted } from 'vue'
  import { QuillEditor } from '@vueup/vue-quill'
  import AdminLayout from '@/Layouts/AdminLayout.vue'
  import BlotFormatter from 'quill-blot-formatter'
  import '@vueup/vue-quill/dist/vue-quill.snow.css'
  import { useForm,usePage } from '@inertiajs/vue3'
  
  export default defineComponent({
    components: {
      AdminLayout,
      QuillEditor,
    },
    props:{
        detail:Object
    },
    setup(props) {
      const modules = {
        name: 'blotFormatter',
        module: BlotFormatter,
        options: {/* options */}
      }
    
      const quillEditor = ref('');
      const page = usePage();

      const form = useForm({
              judul:props.detail ? props.detail.judul : '',
              author:page.props.auth.user.name,
              deskripsi:props.detail ? props.detail.deskripsi : '',
      });
    
      onMounted(() => {
        quillEditor.value.setHTML(props.detail.konten)
      })
      const SimpanBerita = () => {
      
          const htmlContent = quillEditor.value.getHTML(); 
          form.transform(data => ({
          _method:'put',
          ...data,
          konten:htmlContent,
        })).post(route('admin_berita.update',{id:props.detail.id}), {
          onFinish: () => {
              form.reset('');
              
          },
      });
      
        }
      
  
      return { modules, quillEditor, SimpanBerita,form }
    },
  })
  </script>
  