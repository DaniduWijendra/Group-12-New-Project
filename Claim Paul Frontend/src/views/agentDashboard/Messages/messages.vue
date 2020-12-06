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
     

      <v-toolbar-title>Send Email</v-toolbar-title>

      <v-spacer></v-spacer>

      
    </v-app-bar>

   

    <v-card-text>
      <v-form enctype="multipart/form-data" method="post" class="contact-form" @submit.prevent="sendEmail">
          
  <v-container fluid>
    <v-row>
      <v-col cols="4">
        <v-subheader>Name</v-subheader>
      </v-col>
      <v-col cols="8">
        <v-text-field
          label="Name"
          name="name"
          value="buddhi"
          prefix="Mr/Mrs"
        ></v-text-field>
      </v-col>
    </v-row>



    <v-row>
      <v-col cols="4">
        <v-subheader>Email</v-subheader>
      </v-col>
      <v-col cols="8">
        <v-text-field
          label="Email address"
          name="email"
          value="example"
          suffix="@gmail.com"
        ></v-text-field>
      </v-col>
    </v-row>

        <v-row>
      <v-col cols="4">
        <v-subheader>Subject</v-subheader>
      </v-col>
      <v-col cols="8">
        <v-text-field
          label="Subject"
          name="subject"
          
        ></v-text-field>
      </v-col>
    </v-row>

        <v-row>
      <v-col cols="4">
        <v-subheader>Message</v-subheader>
      </v-col>
      <v-col cols="8">
       <v-textarea
          filled
          auto-grow
          label="Message"
          name="message"
          rows="5"
          row-height="30"
          shaped
          
        ></v-textarea>
      </v-col>
    </v-row>

    <v-row>
      <v-col cols="4">
        <v-btn 
        type='submit'
        fab
       dark
       large
       color="cyan"
       >

       <v-icon>mdi-send</v-icon>
       
       </v-btn>
      </v-col>
    </v-row>

  </v-container>


          <!-- <label>Attachment</label>
          <input type="file" name="file" id=""> -->

          
      </v-form>
    </v-card-text>
  </v-card>

</template>

<script>
import emailjs from 'emailjs-com';

export default {

  data: () => ({
      
      
    
      
     
    }),

   
  methods: {
    sendEmail: (e) => {
      emailjs.sendForm('service_g6if7zb','claim_paul', e.target, 'user_STuuqjdWTVs3IQSFqi0Bx')
        .then((result) => {
            console.log('SUCCESS!', result.status, result.text);
        }, (error) => {
            console.log('FAILED...', error);
        });

        this.clear();
    },

    
    clearMessage () {
        this.message = ''
      },
  }
}
</script>