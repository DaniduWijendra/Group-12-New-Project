<template>

  <v-stepper
    v-model="e13"
    vertical
    class="mt-6"
  >
    <v-stepper-step
      step="1"
      complete
    >
      1 Capture photos of Damaged Places
    </v-stepper-step>

    <v-stepper-content step="1">
      <v-card
        color="grey lighten-1"
        class="mb-12"
        height="200px"
      >
      
                <v-img pa-2
         src="../../../assets/img/policyholder/damage1.jpg" max-width="800" min-height="200"></v-img>
      
      </v-card>
      <v-btn
        color="primary"
        @click="e13 = 2"
      >
        Continue
      </v-btn>
      <v-btn text class="red">
        Cancel
      </v-btn>
    </v-stepper-content>

    <v-stepper-step
      step="2"
      complete
    >
      2 Upload Photos through Mobile App
    </v-stepper-step>

    <v-stepper-content step="2">
      <v-card
        color="grey lighten-1"
        class="mb-12"
        height="200px"
      >
        <v-img pa-2
         src="../../../assets/img/policyholder/upload.jpg" max-width="800" min-height="200"></v-img>
      </v-card>
      <v-btn
        color="primary"
        @click="e13 = 3"
      >
        Continue
      </v-btn>
      <v-btn text class="red">
        Cancel
      </v-btn>
    </v-stepper-content>

    <v-stepper-step
      complete
      step="3"
    >
      Get Cost
  
    </v-stepper-step>

    <v-stepper-content step="3">
      <v-card
        color="grey lighten-1"
        class="mb-12"
        height="200px"
      >
      
        <v-img pa-2
         src="../../../assets/img/policyholder/cost.jpg" max-width="800" min-height="400"></v-img>
      </v-card>
      <v-btn
        color="primary"
        @click="e13 = 4"
      >
        Continue
      </v-btn>
      <v-btn text class="red">
        Cancel
      </v-btn>
    </v-stepper-content>

    <v-stepper-step step="4">
      Enjoy With ClaimPaul
    </v-stepper-step>

    <v-stepper-content step="4">
      <v-card
        color="grey lighten-1"
        class="mb-12"
        height="200px"
      >
                <v-img pa-2
         src="../../../assets/img/policyholder/enjoy.jpg" max-width="800" min-height="400"></v-img>
      </v-card>
      <v-btn
        color="primary"
        @click="e13 = 1"
      >
        Continue
      </v-btn>
      <v-btn text class="red">
        Cancel
      </v-btn>
    </v-stepper-content>
  </v-stepper>
</template>


<script>
  export default {
    data () {
      return {
        e13: 1,
      }
    },
  }
</script>