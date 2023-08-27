<template>
    <v-card
      max-width="400"
      class="mx-auto"
    >
      <v-container class="bg-white rounded-pill">
        <v-row dense>
          <v-col cols="12">
            <v-card
              color="#385F73"
              theme="dark"
            >
              <v-card-title class="text-h5">
               Profil Mitra
              </v-card-title>
  
              <v-card-subtitle> Check Detail Profil Web di halaman utama </v-card-subtitle>
  
              <v-card-actions>
                <v-btn variant="text">
                  Check Now
                </v-btn>
              </v-card-actions>
            </v-card>
          </v-col>
  
          <v-col cols="12">
            <v-card
              color="#1F7087"
              theme="dark"
            >
              <div class="d-flex flex-no-wrap justify-space-between">
                <div>
                  <v-card-title class="text-h5">
                    Toko
                  </v-card-title>
  
                  <v-card-subtitle>Upload Produk Anda Sekarang</v-card-subtitle>
  
                  <v-card-actions>
                    <v-btn
                      class="ms-2"
                      variant="outlined"
                      prepend-icon="mdi-package-variant-closed-plus"
                      size="small"
                    >
                      Tambah Produk
                    </v-btn>
                  </v-card-actions>
                </div>
  
                <v-avatar
                  class="ma-3"
                  size="125"
                  rounded="0"
                >
                  <v-img src="/img/product.png"></v-img>
                </v-avatar>
              </div>
            </v-card>
          </v-col>
  
          <v-col cols="12">
            <v-card
              color="#952175"
              theme="dark"
            >
              <div class="d-flex flex-no-wrap justify-space-between">
                <div>
                  <v-card-title class="text-h5">
                    Gallery 
                  </v-card-title>
  
                  <v-card-subtitle>Upload Foto Kegiatan atau Produk </v-card-subtitle>
  
                  <v-card-actions>
                    <v-btn
                      class="ms-2"
                      icon="mdi-cloud-upload-outline"
                      variant="text"
                    ></v-btn>
                  </v-card-actions>
                </div>
  
                <v-avatar
                  class="ma-3"
                  size="125"
                  rounded="0"
                >
                  <v-img src="/img/galllery.png"></v-img>
                </v-avatar>
              </div>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
    </v-card>
  </template>