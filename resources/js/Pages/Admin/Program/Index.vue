<template>
    <AdminLayout>
       <v-container class="bg-white overflow-hidden">
        <v-breadcrumbs :items="['Home', 'Bar', 'Fizz']"></v-breadcrumbs>

        <v-card>
            <v-card-title>
              Data Program
              <v-spacer></v-spacer>
                <div class="d-flex justify-between w-full">
                    <div class="w-1/4">
                   
                    <v-text-field
                    v-model="search"
                    append-inner-icon="mdi-magnify"
                    label="Search"
                    variant="underlined"
                    density="compact"
                    hide-details
                  ></v-text-field>
                </div>
                <div class="2/6">
                    <v-btn  @click="sheet_add = !sheet_add" color="primary" prepend-icon="mdi-plus">
                        Tambah
                     </v-btn>

                </div>
               

            </div>
            
            <FlashSession />
            </v-card-title>
            <v-data-table
              :headers="headers"
              :items="updatedDataProgram"
              :search="search"
            >
            <template v-slot:item="{ item }">
                <tr>
                  <td>{{ item.columns.id }}</td>
                  <td>{{ item.columns.nama_program }}</td>
                  <td>{{ item.columns.deskripsi_program }}</td>
                  <td><Status :case_number="item.columns.status_program" /></td>
                  <td> 
                    <v-btn @click.prevent="edit(item.columns.id)" icon="mdi-square-edit-outline" color="green" class="mr-2" size="small"></v-btn>
                    <v-btn @click="remove(item.columns.id)" icon="mdi-delete-circle" color="red" size="small"></v-btn>
                    
                  </td>
                </tr>
              </template>
            </v-data-table>
          </v-card>
        
       </v-container>

       <v-bottom-sheet v-model="sheet_add">
        <v-card
          class="text-center"
          height="500"
        >
          <v-card-text>
            <v-btn
              variant="text"
              @click="sheet_add = !sheet_add"
            >
              close
            </v-btn>
            <br>
            <br>
            <div>
            <FormAdd @data-update="onDataUpdate" @close-sheet="sheet_add = !sheet_add"/>
            </div>
          </v-card-text>
        </v-card>
      </v-bottom-sheet>

      <v-bottom-sheet v-model="sheet_edit">
        <v-card
          class="text-center"
          height="500"
        >
          <v-card-text>
            <v-btn
              variant="text"
              @click="sheet_edit = !sheet_edit"
            >
              close
            </v-btn>
            <br>
            <br>
            <div>
            <FormEdit :detail_program="detail_program" @data-update="onDataUpdate" @close-sheet="sheet_edit = !sheet_edit"/>
            </div>
          </v-card-text>
        </v-card>
      </v-bottom-sheet>
    </AdminLayout>

</template>

<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { ref ,defineProps,onMounted,onUnmounted,computed,watch} from 'vue';
import { usePage,Link,useForm } from '@inertiajs/vue3'
import Status from '@/Pages/Admin/Components/Status.vue'
import FormAdd from '@/Pages/Admin/Program/Add.vue'
import FormEdit from '@/Pages/Admin/Program/Edit.vue'
import FlashSession from '@/Pages/Admin/Components/AlertSession.vue';
import axios from 'axios';
const page = usePage();
const url = window.location.origin
const props = defineProps({
    data_program:Object,
})
const sheet_add = ref(false)
const sheet_edit = ref(false)

const form = useForm([]);
const data_program = ref(props.data_program);
const detail_program = ref(null);


const search = ref('');
const headers = [
  {
    align: 'start',
    key: 'id',
    sortable: false,
    title: 'ID',
  },
  { key: 'nama_program', title: 'Nama Program' },
  { key: 'deskripsi_program', title: 'Deskripsi' },
  { key: 'status_program', title: 'Status Program' },
  { key: 'action', title: 'Action' },
];
watch(sheet_edit, (newVal) => {
    if (!newVal) {
        detail_program.value = null;
    }
});

const edit = async(id) =>{
   
    sheet_edit.value = !sheet_edit.value;
    try{
        const response = await axios.get(url+'/api/program/'+id)
        detail_program.value = response.data;

    }catch(error){

    }

}

const remove = async(id) =>{

    if (confirm("Are you sure you want to Delete")) {
        form.delete(route('admin_program.destroy', id));
        onDataAdded();
    }

}
const onDataUpdate = async () => {
    try {
        const response = await axios.get(url+'/api/program');
        data_program.value = response.data;
      
    } catch (error) {
       
    }
};

const updatedDataProgram = computed(() => data_program.value);

</script>
