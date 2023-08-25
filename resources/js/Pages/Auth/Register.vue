<template>
    <Head title="Register" />
    <AuthenticationCard classes="p-0">
        <template #logo>
            <AuthenticationCardLogo />
        </template>
    <form @submit.prevent="submit">
    <v-stepper

      v-model="step"
      :items="items"
      alt-labels
      next-text="Next"
      prev-text="kembali"
      :editable="step === items.length"
      :hide-actions="step === step"
      
      
    >
    <template v-slot:item.1="{step}" >
        <h3 class="text-small">Isikan Data Diri Dengan Benar </h3>
  
        <br>
  
        <v-sheet border>
            <v-text-field
            v-model="state.name"
            :error-messages="v$.name.$errors.map(e => e.$message)"
            label="Nama Lengkap"
            prepend-inner-icon="mdi-account"
            required
            @input="v$.name.$touch"
            @blur="v$.name.$touch"
          ></v-text-field>

          <v-text-field
          v-model="state.email"
          :error-messages="v$.email.$errors.map(e => e.$message)"
          :counter="10"
          label="Email"
          prepend-inner-icon="mdi-email"
          required
          @input="v$.email.$touch"
          @blur="v$.email.$touch"
          ></v-text-field>

        <v-text-field
        v-model="state.password"
        :error-messages="v$.password.$errors.map(e => e.$message)"
        :counter="10"
        label="Password"
        type="password"
        required
        autocomplete
        prepend-inner-icon="mdi-lock"
        @input="v$.password.$touch"
        @blur="v$.password.$touch"
        ></v-text-field>
        
        <v-text-field
        v-model="state.password_confirm"
        :error-messages="v$.password_confirm.$errors.map(e => e.$message)"
        :counter="10"
        prepend-inner-icon="mdi-lock"
        label="Konfirmasi Password"
        type="password"
        required
        autocomplete
        @input="v$.password_confirm.$touch"
        @blur="v$.password_confirm.$touch"
        ></v-text-field>

        
        </v-sheet>
       

        <v-btn
        color="primary"
        variant="outlined"
        class="mt-4 w-full ml-auto"
        @click="nextStep(1)"
      >
        Next
      </v-btn>
      </template> 
  
      <template v-slot:item.2="{ step }">
        <h3 class="text-small">Isikan data usaha dengan benar</h3>
  
        <br>
  
        <v-sheet border>
          <v-text-field
          v-model="state.nama_usaha"
          :error-messages="v$.nama_usaha.$errors.map(e => e.$message)"
          label="Nama usaha"
          prepend-inner-icon="mdi-domain"
          required
          @input="v$.nama_usaha.$touch"
          @blur="v$.nama_usaha.$touch"
        ></v-text-field>

        <v-text-field
          v-model="state.alamat_usaha"
          :error-messages="v$.alamat_usaha.$errors.map(e => e.$message)"
          label="Alamat usaha"
          prepend-inner-icon="mdi-office-building-marker-outline"
          required
          @input="v$.alamat_usaha.$touch"
          @blur="v$.alamat_usaha.$touch"
        ></v-text-field>
        <v-text-field
        v-model="state.no_hp"
        :error-messages="v$.no_hp.$errors.map(e => e.$message)"
        :counter="12"
        label="No Hp Usaha"
        prepend-inner-icon="mdi-phone"
        required
        @input="v$.no_hp.$touch"
        @blur="v$.no_hp.$touch"
      ></v-text-field>
        <v-select
        clearable
        v-model="state.jenis_usaha"
        :error-messages="v$.jenis_usaha.$errors.map(e => e.$message)"
        chips
        prepend-inner-icon="mdi-list-box-outline"
        density="compact"
        label="Jenis Usaha"
        :items="programList"
        item-title="nama_program"
        item-value="id"
        @input="v$.jenis_usaha.$touch"
        @blur="v$.jenis_usaha.$touch"
        ></v-select>

      
        </v-sheet>

        <div class="d-flex justify-between">
          <v-btn
          color="primary"
          variant="outlined"
          class="mt-4 w-1/4"
          @click="previousStep(2)"
        >
          Back
        </v-btn>
  
          <v-btn
          color="primary"
          variant="outlined"
          class="mt-4 w-1/4"
          @click="nextStep(2)"
        >
          Next
        </v-btn>


        </div>
    
      
      </template>

      <template v-slot:item.3="{step}">
        <h3 class="text-small">Isikan data usaha dengan benar</h3>
       
        <v-text-field
        v-model="state.bidang_usaha"
        :error-messages="v$.bidang_usaha.$errors.map(e => e.$message)"
        label="Bidang usaha"
        prepend-inner-icon="mdi-sitemap-outline"
        required
        @input="v$.bidang_usaha.$touch"
        @blur="v$.bidang_usaha.$touch"
      ></v-text-field>

        <v-text-field
        v-model="state.jumlah_tenaga_kerja"
        :error-messages="v$.jumlah_tenaga_kerja.$errors.map(e => e.$message)"
        label="Jumlah Tenaga Kerja"
        type="number"
        prepend-inner-icon="mdi-account-group-outline"
        required
        @input="v$.jumlah_tenaga_kerja.$touch"
        @blur="v$.jumlah_tenaga_kerja.$touch"
      ></v-text-field>

      <v-text-field
      v-model="state.no_ijin_usaha"
      :error-messages="v$.no_ijin_usaha.$errors.map(e => e.$message)"
      label="Nomor Ijin Usaha"
      prepend-inner-icon="mdi-file-document-edit-outline"
      required
      @input="v$.no_ijin_usaha.$touch"
      @blur="v$.no_ijin_usaha.$touch"
    ></v-text-field>

       <v-text-field
       v-model="state.no_npwp"
    :error-messages="v$.no_npwp.$errors.map(e => e.$message)"
    label="Nomor NPWP"
    prepend-inner-icon="mdi-file-document-check-outline"
    required
    @input="v$.no_npwp.$touch"
    @blur="v$.no_npwp.$touch"
    ></v-text-field>

     <v-btn
      color="primary"
      variant="outlined"
      class="mt-4 w-full ml-auto"
      v-if="step !== items.length"
      @click="submitForm()"
      >
      Register
      </v-btn>

      </template>
    
    </v-stepper>
    </form>
    <div class="flex items-center justify-center mt-4">
        <Link :href="route('login')" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Sudah Punya Akun ?
        </Link>
    </div>

    
</AuthenticationCard>

  </template>
  <script setup>
  import { Head, Link,useForm } from '@inertiajs/vue3';
  import { ref, computed,reactive } from 'vue';
  import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
  import AuthenticationCard from '@/Components/AuthenticationCard.vue';
  import { useVuelidate } from '@vuelidate/core';
  import { email, required, integer, helpers, minLength,sameAs } from '@vuelidate/validators';
import axios from 'axios';
import { onMounted } from 'vue';
  
  const requiredMessage = () => ({ required: helpers.withMessage('Kolom ini Wajib Di Isi', required) });

  const step = ref(1);
  const programList = ref([]);
  const items = ref(['Data Diri', 'Data Usaha','Detail Usaha']);
  const url = window.location.origin;
  const initialState = {
    name: '',
    email: '',
    no_hp: '',
    password: '',
    password_confirm: '',
  };
  
  const state = useForm({
    name: '',
    email: '',
    no_hp: '',
    password: '',
    password_confirm: '',
    nama_usaha: '',
    alamat_usaha: '',
    jenis_usaha: null,
    bidang_usaha: null,
    no_npwp:'',
    no_ijin_usaha: '',
    jumlah_tenaga_kerja: '',
  });

  const passwordConfirm = computed(() => state.password);

  const programData = async() =>{
          const result = await axios.get(url+'/api/public/program');
            programList.value = result.data;
  }

  onMounted(()=>{
      programData();
  })

  // const selectedItem = programList.value;
  const rules = {
    name: requiredMessage(),
    no_hp: {
      ...requiredMessage(),
      integer,
      minLength: helpers.withMessage('Harus Berisi 4 karakter', minLength(4)),
    },
    email: { ...requiredMessage(), email: helpers.withMessage('Harus berisi email yang aktif', email) },
    password: { 
      ...requiredMessage(),
      minLength: helpers.withMessage('Harus Berisi 8 karakter', minLength(8)),
     },
    password_confirm: { ...requiredMessage(),sameAsPassword:helpers.withMessage('password konfirmasi tidak sama dengan password',sameAs(passwordConfirm)) },
    nama_usaha:{ ...requiredMessage() },
    alamat_usaha:{...requiredMessage() },
    jenis_usaha:{...requiredMessage()},
    bidang_usaha:{...requiredMessage()},
    no_npwp: { ...requiredMessage() },
    no_ijin_usaha:{...requiredMessage()},
    jumlah_tenaga_kerja:{...requiredMessage()}
  };
  
  const v$ = useVuelidate(rules, state);
  const validateStep1 = ref(false);

  const previousStep = (stepNumber) =>{
    if(stepNumber === 2){
      step.value = stepNumber  - 1;
    }

  } 
  
  const nextStep = (stepNumber) => {

    if (stepNumber === 1) {

      v$?.value.name?.$touch?.();
      v$?.value.password?.$touch?.();
      v$?.value.email?.$touch?.();
      v$?.value.password_confirm?.$touch?.();
      validateStep1.value = true;
  
      if (!v$?.value.name?.$invalid && !v$?.value.password?.$invalid && !v$?.value.email?.$invalid && !v$.value.password_confirm?.$invalid) {
        step.value = stepNumber + 1;
      }
    } else if(stepNumber === 2) {

      v$?.value.nama_usaha?.$touch?.();
      v$?.value.alamat_usaha?.$touch?.();
      v$?.value.no_hp?.$touch?.();
      v$?.value.jenis_usaha?.$touch?.();

      if(!v$?.value.nama_usaha?.$invalid && !v$?.value.alamat_usaha?.$invalid && !v$.value.no_hp?.$invalid && !v$.value.jenis_usaha?.$invalid) {
        step.value = stepNumber + 1;
      }
      
    }else{
      step.value = stepNumber + 1;

    }
  };
  
  const submitForm = () => {

    if (step.value === items.value.length) {

      state.transform(data => ({
        ...data,
      })).post(route('register_mitra'), {
        onFinish: () => state.reset('password','password_confirm'),
    });
      // alert('Registration complete');
    }
  };
  </script>
