<template>
    <v-card
      theme="light"
      flat
      rounded="0"
    >
      <v-window v-model="onboarding" show-arrows="">
        <v-window-item
          v-for="n in length"
          :key="`card-${n}`"
          :value="n"
        >
          <v-card
            height="150"
            class="d-flex justify-center align-center"
          >
            <span class="text-h2">
              Card {{ n }}
            </span>
          </v-card>
        </v-window-item>
      </v-window>
    </v-card>
  </template>

  <script>
  export default {
    data: () => ({
      length: 3,
      onboarding: 0,
    }),

    methods: {
      next () {
        this.onboarding = this.onboarding + 1 > this.length
          ? 1
          : this.onboarding + 1
      },
      prev () {
        this.onboarding = this.onboarding - 1 <= 0
          ? this.length
          : this.onboarding - 1
      },
    },
  }
</script>