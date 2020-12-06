<template>

  <v-form
    ref="form"
    v-model="valid"
    lazy-validation
  >
     <v-text-field
    
    label="Name"
    outlined
    clearable
    prepend-icon="mdi-account"
    ></v-text-field>

     <v-text-field
    
    label="email"
    outlined
    clearable
    prepend-icon="mdi-at"
    ></v-text-field>

    <v-textarea
    label="Complain"
    auto-grow
    outlined
    rows="3"
    row-height="25"
    shaped
    prepend-icon="mdi-comment-quote"
    ></v-textarea>
    

    <v-btn
      
      color="blue"
      class="mr-4"
      fab
    >
      <v-icon large>mdi-send-circle</v-icon>
    </v-btn>

    
  </v-form>
</template>


<script>
  export default {
    data: () => ({
      
    }),

    methods: {
      
    },
  }
</script>