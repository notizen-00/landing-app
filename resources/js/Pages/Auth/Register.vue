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
      :hide-actions="step === items.length"
      
      
    >
    <template v-slot:item.1 >
        <h3 class="text-small">Isikan Data Diri Dengan Benar</h3>
  
        <br>
  
        <v-sheet border>
            <v-text-field
            v-model="state.name"
            :error-messages="v$.name.$errors.map(e => e.$message)"
            :counter="10"
            label="Name"
            required
            @input="v$.name.$touch"
            @blur="v$.name.$touch"
          ></v-text-field>
        </v-sheet>
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

import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import { reactive } from 'vue'
import { useVuelidate } from '@vuelidate/core'
import { email, required } from '@vuelidate/validators'
  export default {
    components: {
        AuthenticationCard,
        AuthenticationCardLogo,
        Head,
        Link
    },
    data: () => ({
      shipping: 0,
      step: 2,
      items: [
        'Data Diri',
        'Data Usaha',
      ],
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
        select: null,
        checkbox: null,
      },
      state: reactive({
        name: '',
        email: '',
        select: null,
        checkbox: null,
      }),
      selectitems: [
        'Item 1',
        'Item 2',
        'Item 3',
        'Item 4',
      ],
      rules: {
        name: { required },
        email: { required, email },
        select: { required },
        items: { required },
        checkbox: { required },
      },
      v$: null,
    }),

    computed: {
      subtotal () {
        return this.products.reduce((acc, product) => acc + product.quantity * product.price, 0)
      },
      total () {
        return this.subtotal + Number(this.shipping ?? 0)
      },
    },
    methods: {
    nextStep() {
      this.step++;
    },
    submitForm() {
      // Perform form submission logic here
      alert('selesai');
    },
  },
  }
</script>