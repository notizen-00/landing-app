<template>
    <MitraLayout>
  
        <v-container class="relative bg-blue-100 rounded-t-xl h-screen">
            <v-row>
                <v-col cols="12">
                    <v-sheet
                    elevation="0"
                    rounded="lg"
                    width="100%"
                    color="white"
                    class="pa-4 bg-blue-500/50 text-center rounded-t-xl mx-auto"
                    >
                    <v-row>
                        <v-col cols="4">
                            <v-avatar
                            class="mb-5 border-2 "
                            color="primary"
                            size="80"
                            >{{ $page.props.auth.user.name.substr(0,3) }}</v-avatar>
                        </v-col>
                        <v-col cols="8 my-auto">
                            <h2 class="text-h5 max-h-1 w-full inline-block mb-6 text-start">Hi , {{ $page.props.auth.user.name }}</h2>
                            <br>
                            <v-chip
                            class="d-flex bg-red mt-2 pl-4 justify-start w-1/2"
                            size="small"
                            prepend-icon="mdi-account-cancel-outline"
                            >
                            <span>Pending</span>
                          </v-chip>
                        </v-col>
                    </v-row>

                    <p class="mb-4 text-start text-slate-600 text-body-3">
                        Status akun anda masih pending tunggu verifikasi admin
                    </p>

                    <v-divider class="mb-4 border-opacity-50" :thickness="4" color="info"></v-divider>

                        <div class="text-end">
                            <v-btn
                                class="text-none"
                                color="success"
                                rounded
                                variant="flat"
                                width="90"
                                >
                                Done
                            </v-btn>
                        </div>
                    </v-sheet>
                </v-col>
            </v-row>
        </v-container>
       
  
    </MitraLayout>
</template>
<script setup>
import MitraLayout from "@/Layouts/MitraLayout.vue"
</script>