<template>
    <form @submit.prevent="submit">
        <v-text-field
        v-model="form.nama_program"
        clearable
        label="Nama Program"
        prepend-icon="mdi-note-outline"
        variant="underlined"
        required
        ></v-text-field>

        <v-textarea
        clearable
        v-model="form.deskripsi_program"
        label="Deskripsi Program"
        prepend-icon="mdi-note-edit-outline"
        variant="outlined"
        ></v-textarea>

        <v-btn
        block
        append-icon="mdi-content-save-all-outline "
        color="success"
        type="submit"
        >
        Update
        </v-btn>
    </form>
</template>
<script setup>
    import {ref,onMounted,onUnmounted,computed,watch} from 'vue'
    import { useForm,usePage} from '@inertiajs/vue3';
    import { faArrowAltCircleRight } from '@fortawesome/free-solid-svg-icons';
    import axios from 'axios';

    const props = defineProps({
        detail_program:Object
    })
    const id_program = ref(null);
    const form = useForm({
        nama_program:'',
        deskripsi_program:''
    });
    watch(() => props.detail_program, (newDetailProgram) => {
    if (newDetailProgram) {
        form.nama_program = newDetailProgram.nama_program;
        form.deskripsi_program = newDetailProgram.deskripsi_program;
        id_program.value = newDetailProgram.id;
    }
    });
    
    const page = usePage();

    const emit = defineEmits(['close-sheet','data-update','clear-detail']);
    
   

    const submit = () =>{

        form.transform(data => ({
        _method:'put',
        ...data,
      })).post(route('admin_program.update',{id:id_program.value}), {
        onFinish: () => {
            form.reset('');
            emit('data-update');
            emit('close-sheet')
        },
    });

    }
</script>
<style scoped>
.v-field fieldset {
    color: red !important;
    display:none !important;
}
</style>