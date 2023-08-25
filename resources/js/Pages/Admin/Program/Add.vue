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
        Simpan
        </v-btn>
    </form>
</template>
<script setup>
    import {ref,onMounted,onUnmounted} from 'vue'
    import { useForm,usePage} from '@inertiajs/vue3';
    import { faArrowAltCircleRight } from '@fortawesome/free-solid-svg-icons';
    import axios from 'axios';
    const form = useForm({
        nama_program:'',
        deskripsi_program:''
    });

    const page = usePage();

    const emit = defineEmits(['close-sheet','data-added']);


    const submit = () =>{

        form.transform(data => ({
        ...data,
      })).post(route('admin_program.store'), {
        onFinish: () => {
            form.reset('');
            emit('data-added');
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