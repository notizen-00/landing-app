<template>

    <div class="text-center items-center text-h4 relative pb-10 pt-10 pl-10">
        <span class="font-serif pb-4"> -- Gallery -- </span> 
        <v-divider
        :thickness="5"
        class="border-opacity-100 absolute border-3 right-1/4  w-1/2 mt-4 border-yellow-400"
        color="warning"
        ></v-divider>
     </div>
    <v-row class="w-2/3 mx-auto">
      <template v-for="(image,imgIdx) in imageLayout" :key="imgIdx">
        <v-col :cols="image.cols">
          <v-img
            :src="`https://picsum.photos/500/300?image=${image.cols * 20}`"
            cover
            height="100%"
          ></v-img>
        </v-col>
  
        <v-col v-if="image.children" cols="6" class="d-flex flex-column">
          <v-row>
            <v-col v-for="(children,childIdx) in image.children" :key="childIdx" :cols="children.cols">
              <v-img
                :src="`https://picsum.photos/500/300?image=${children.cols + childIdx}`"
                cover
                height="100%"
              ></v-img>
            </v-col>
          </v-row>
        </v-col>
      </template>
    </v-row>
  </template>
  <script setup>
  const imageLayout = [
    { cols: 4 },
    {
      cols: 8,
      children: [{ cols: 12 }, { cols: 12 }],
    },
    { cols: 6 },
  ]
</script>