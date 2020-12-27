<template>

  <v-form v-model="valid"
    ref="form"
    lazy-validation
    v-on:submit.prevent='sendMail'
  >
  <v-row>
      <v-col cols="12" md="6">
     <v-text-field
    
    label="First Name"
    outlined
    clearable 
    prepend-icon="mdi-form-textbox"
    v-model="mail.fname"
    ></v-text-field>
      </v-col>
      <v-col cols="12" md="6">

    <v-text-field
    
    label="Last Name"
    outlined
    clearable
    prepend-icon="mdi-form-textbox"
    v-model="mail.lname"
    ></v-text-field>
      </v-col>
    <v-col cols="12" md="6">
     <v-text-field
    
    label="Contact"
    outlined
    clearable :rules="[rules.required,rules.tel]"
    prepend-icon="mdi-phone" @keypress="isNumber($event)"
    v-model="mail.phone" maxlength="10"
    ></v-text-field>
    </v-col>
    <v-col cols="12" md="6">
     <v-text-field
    label="email*"
    placeholder="type mail address"
    outlined :rules="emailRules"
    clearable
    prepend-icon="mdi-at"
    v-model="mail.email"
    ></v-text-field>
    </v-col>
    <v-col cols="12" md="12">
    <v-textarea
    label="Message*"
    placeholder="type message"
    auto-grow
    outlined
    rows="3"
    row-height="25"
    shaped
    prepend-icon="mdi-comment-quote"
    v-model="mail.message"
    ></v-textarea>
    </v-col>

    <v-col cols="12" md="12">
        <v-btn x-large block :disabled="!valid" color="green darken-2" @click="sendMail"> <v-icon large @click="sendMail">mdi-arrow-right-circle</v-icon> Login </v-btn>
    
    </v-col>
</v-row>
    
  </v-form>
</template>


<script>
import Axios from '../../baseURL'
  export default {
    data: () => ({

      mail:{
        fname:'',
        lname:'',
        email:'',
        message:'',
        phone:'',
      },
      valid:true,
      rules: {
      required: value => !!value || "Required.",
      tel: v => (v && v.length === 10) || "Telephone number not valid"
    },
      emailRules: [
      v => !!v || "Required",
      v => /.+@.+\..+/.test(v) || "E-mail must be valid"
    ],
      
    }),

    methods: {
        isNumber: function(evt) {
      evt = (evt) ? evt : window.event;
      var charCode = (evt.which) ? evt.which : evt.keyCode;
      if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        evt.preventDefault();;
      } else {
        return true;
      }
    },
  

      sendMail(){

          Axios.post('contact_mail',this.mail).then(()=>{

               this.s('Your Mail Successfully sent');

            }).catch(error=>{
                
                console.log(error.response.data.error);
          
            });

      }
      
    },
  }
</script>