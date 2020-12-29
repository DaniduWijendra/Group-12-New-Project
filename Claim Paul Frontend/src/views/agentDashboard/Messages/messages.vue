<template>
 
  <v-card
    class="mx-auto overflow-hidden"
    height="800"
    width="1000"
  >
    <v-system-bar color="deep-purple darken-3"></v-system-bar>

    <v-app-bar
      color="deep-purple accent-4"
      dark
      prominent
    >
     

      <v-toolbar-title>Send Urgent Text Email</v-toolbar-title>

      <v-spacer></v-spacer>

      
    </v-app-bar>

   

    <v-card-text>
      
          
  <v-container fluid>
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
    label="Message"
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

    Do you want dend file attachment pleaase click link<a href="https://mail.google.com"> here</a>

    
  </v-form>

  </v-container>


          <!-- <label>Attachment</label>
          <input type="file" name="file" id=""> -->

          

    </v-card-text>
  </v-card>

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
        role:'Agent'
      },
      branch:[
           'Galle',
        'Matara',
        'Ambalangoda',
        'Kurunagala'
      ]
    
      
     
    }),

   
  methods: {
    // sendEmail: (e) => {
    //   emailjs.sendForm('service_g6if7zb','claim_paul', e.target, 'user_STuuqjdWTVs3IQSFqi0Bx')
    //     .then((result) => {
    //         console.log('SUCCESS!', result.status, result.text);
    //     }, (error) => {
    //         console.log('FAILED...', error);
    //     });

    //     this.clear();
    // },

    
    // clearMessage () {
    //     this.message = ''
    //   },

    
      sendMail(){

          Axios.post('admin_mail',this.mail).then(()=>{

               this.s('Your Mail Successfully sent');

            }).catch(error=>{
                
                console.log(error.response.data.error);
          
            });

            this.clear();

      },

      clear(){
        this.mail.name="";
        this.mail.email="";
        this.mail.complain="";
        this.mail.branch="";
        this.mail.topic="";
        
      }
      
    
  }
}
</script>