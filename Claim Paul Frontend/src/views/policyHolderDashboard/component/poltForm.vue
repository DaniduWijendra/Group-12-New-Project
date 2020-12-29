<template>

  <v-form
    ref="form"
    lazy-validation
    v-on:submit.prevent='sendMail'
    enctype="multipart/form-data"
  >
     <v-text-field
    
    label="Name"
    outlined
    clearable
    prepend-icon="mdi-account"
    v-model="mail.name"
    ></v-text-field>

     <v-text-field
    
    label="email"
    outlined
    clearable
    prepend-icon="mdi-at"
    v-model="mail.email"
    ></v-text-field>

    <v-textarea
    label="Complain"
    auto-grow
    outlined
    rows="3"
    row-height="25"
    shaped
    prepend-icon="mdi-comment-quote"
    v-model="mail.complain"
    ></v-textarea>


    <v-btn
      
      color="blue"
      class="mr-4"
      fab
    >
      <v-icon large @click="sendMail">mdi-send-circle</v-icon>
    </v-btn>

    
  </v-form>
</template>


<script>
import Axios from '../../../baseURL'
  export default {
    data: () => ({

      mail:{
        name:'',
        email:'',
        complain:'',
        file:''
      }
      
    }),

    methods: {
  

      sendMail(){

          Axios.post('send_mail',this.mail).then(()=>{

               this.s("OK Your Complain is Sended Successfully,");
               this.i("We try to immdiately respond you");

            }).catch(error=>{
                
                console.log(error.response.data.error);
          
            });

            this.clear();

      },

      clear(){
        this.mail.name="";
         this.mail.email="";
          this.mail.complain="";
           

      }
      
    },
  }
</script>