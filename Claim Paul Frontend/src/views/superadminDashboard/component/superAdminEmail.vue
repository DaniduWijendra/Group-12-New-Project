<template>

  <v-form
    ref="form"
    lazy-validation
    v-on:submit.prevent='sendMail'
  >
     <v-text-field
    
    label="Your Name"
    outlined
    clearable
    prepend-icon="mdi-account"
    v-model="mail.name"
    ></v-text-field>

    <v-select v-model="mail.branch" prepend-icon="mdi-home-analytics" outlined :items="branch" label="Your Branch:" required>
    </v-select>

     <v-text-field
    
    label="Topic"
    outlined
    clearable
    prepend-icon="mdi-text"
    v-model="mail.topic"
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
        file:'',
        branch:'',
        topic:'',
        role:'Super Admin'
      },
      branch:[
           'Galle',
        'Matara',
        'Ambalangoda',
        'Kurunagala'
      ]
      
    }),

    methods: {
  

      sendMail(){

          Axios.post('admin_mail',this.mail).then(()=>{

               this.s('Your Mail Successfully sent');

            }).catch(error=>{
                
                console.log(error.response.data.error);
          
            });

      }
      
    },
  }
</script>