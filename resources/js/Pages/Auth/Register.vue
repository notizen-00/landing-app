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
        <h3 class="text-small">Isikan Data Diri Dengan Benar</h3>
  
        <br>
  
        <v-sheet border>
            <v-text-field
            v-model="state.name"
            :error-messages="v$.name.$errors.map(e => e.$message)"
            label="Nama Lengkap"
            required
            @input="v$.name.$touch"
            @blur="v$.name.$touch"
          ></v-text-field>

          <v-text-field
          v-model="state.email"
          :error-messages="v$.email.$errors.map(e => e.$message)"
          :counter="10"
          label="Email"
          required
          @input="v$.email.$touch"
          @blur="v$.email.$touch"
          ></v-text-field>

          <v-text-field
          v-model="state.no_hp"
          :error-messages="v$.no_hp.$errors.map(e => e.$message)"
          :counter="12"
          label="No Hp"
          required
          @input="v$.no_hp.$touch"
          @blur="v$.no_hp.$touch"
        ></v-text-field>

        <v-text-field
        v-model="state.password"
        :error-messages="v$.password.$errors.map(e => e.$message)"
        :counter="10"
        label="Password"
        type="password"
        required
        autocomplete
        @input="v$.password.$touch"
        @blur="v$.password.$touch"
        ></v-text-field>
        
        <v-text-field
        v-model="state.password_confirm"
        :counter="10"
        label="Konfirmasi Password"
        type="password"
        required
        autocomplete
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
        <h3 class="text-h6">Confirm</h3>
  
        <br>
  
        <v-sheet border>
          <v-table>
            <thead>
              <tr>
                <th>Description</th>
                <th class="text-end">Quantity</th>
                <th class="text-end">Price</th>
              </tr>
            </thead>
  
            <tbody>
              <tr v-for="(product, index) in products" :key="index">
                <td v-text="product.name"></td>
                <td class="text-end" v-text="product.quantity"></td>
                <td class="text-end" v-text="product.quantity * product.price"></td>
              </tr>
  
              <tr>
                <td>Shipping</td>
                <td></td>
                <td class="text-end" v-text="shipping"></td>
              </tr>
  
              <tr>
                <th>Total</th>
                <th></th>
                <th class="text-end">
                  ${{ total }}
                </th>
              </tr>
            </tbody>
          </v-table>
          
        </v-sheet>
        
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
  <script>
  import { Head, Link } from '@inertiajs/vue3';
  import AuthenticationCard from '@/Components/AuthenticationCard.vue';
  import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
  import { reactive,computed } from 'vue';
  import { useVuelidate } from '@vuelidate/core';
  import { email, required,integer,helpers, minLength,sameAs } from '@vuelidate/validators';
  
  const requiredMessage = () => ({ required: helpers.withMessage('Kolom ini Wajib Di Isi', required) });
  const samePassword = (value) => value.includes('test');

   export default {
    components: {
      AuthenticationCard,
      AuthenticationCardLogo,
      Head,
      Link,
    },
    data() {
      return {
        shipping: 0,
        step: 1,
        items: ['Data Diri', 'Data Usaha'],
        products: [
          {
            name: 'Product 1',
            price: 10,
            quantity: 2,
          },
          {
            name: 'Product 2',
            price: 15,
            quantity: 10,
          },
        ],
        initialState: {
          name: '',
          email: '',
          no_hp:'',
          password: '',
          password_confirm: '',
        },
        state: reactive({
          name: '',
          email: '',
          no_hp: '',
          password:'',
          password_confirm:''
        
        }),
        selectitems: ['Item 1', 'Item 2', 'Item 3', 'Item 4'],
        rules: {
          name: requiredMessage(),
          no_hp: {
            ...requiredMessage(),
            integer,
            minLength: helpers.withMessage('Harus Berisi 4 karakter', minLength(1)),
          },
          email: { ...requiredMessage(), email:helpers.withMessage('Harus berisi email yang aktif', email)},
          password: { required },
        },
        v$: null,
        validateStep1: false,
      };
    },
    created() {
      this.v$ = useVuelidate(this.rules, this.state); // Initialize useVuelidate here
    },
    computed: {
      subtotal() {
        return this.products.reduce(
          (acc, product) => acc + product.quantity * product.price,
          0
        );
      },
      total() {
        return this.subtotal + Number(this.shipping ?? 0);
      },
    },
    methods: {
      nextStep(stepNumber) {
        if (stepNumber === 1) {

          // Pada langkah pertama, validasi dan tandai bahwa validasi telah dilakukan
          this.v$?.name?.$touch?.();
          this.v$?.no_hp?.$touch?.();
          this.v$?.password?.$touch?.();
  
          if(this.state.password != this.state.password_confirm) {
            alert('password tidak cocok')
          }else{
            alert('password cocok')
          }
          this.validateStep1 = true;
  
          if (!this.v$?.name?.$invalid && !this.v$?.no_hp?.$invalid ) {
          
            this.step = stepNumber + 1;
          }
        } else {
          this.step = stepNumber + 1;
        }
      },
      submitForm() {
        // Perform form submission logic here
        alert('selesai');
      },
    },
  };
  </script>