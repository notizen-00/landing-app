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
            Save
            </v-btn>
            </div>
            <div class="w-full d-flex justify-start">
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
              <v-text-field
              class="m-2"
              v-model="form.deskripsi"
              label="Deskripsi Berita">
              </v-text-field>

            </div>
           
          
          </div>
        </template>
      </QuillEditor>

    </v-container>
  </admin-layout>
</template>

<script>
import { ref, defineComponent } from 'vue'
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
  setup() {
    const modules = {
      name: 'blotFormatter',
      module: BlotFormatter,
      options: {/* options */}
    }
   
    const quillEditor = ref('');
    const page = usePage();
    const form = useForm({
            judul:'',
            author:page.props.auth.user.name,
            deskripsi:''
    });
    const SimpanBerita = () => {
    
        const htmlContent = quillEditor.value.getHTML(); 

      

        form.transform(data => ({
        ...data,
        konten:htmlContent,
      })).post(route('admin_berita.store'), {
        onFinish: () => {
            form.reset('');
            
        },
    });
    
      }
    

    return { modules, quillEditor, SimpanBerita,form }
  },
})
</script>
