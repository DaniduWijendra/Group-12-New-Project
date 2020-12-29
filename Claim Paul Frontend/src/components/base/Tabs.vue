<template>
  <v-container
    id="panels"
    fluid
    tag="section"
  >
    

    <v-row>
      <v-col
        cols="12"
        md="6"
      >
        <p class="green-text">FAQ</p>
        <p class="text1">You can learn<br> more from our<br> asked questions</p>
      </v-col>

      <v-col
        cols="12"
        md="6"
      >
        <br>
        <br>
        <br>
        <p>
          You can ask any questions <br>that are complex to you<br> we try to respond you as soon as possible.
        </p>


     
         
      </v-col>
    </v-row>


  
    

    <v-expansion-panels>
      <v-col cols=12 md="6">
      <v-expansion-panel v-for="item in items1" :key="item.title">
        <v-expansion-panel-header>
           <h5>{{item.title}}</h5>
          <template v-slot:actions>
            <v-icon large>
              $expand
            </v-icon>
          </template>
        </v-expansion-panel-header>
        <v-expansion-panel-content>
          {{item.subtitle}}
        </v-expansion-panel-content>
      </v-expansion-panel>
      </v-col>

      <v-col cols=12 md="6">
      <v-expansion-panel v-for="item in items2" :key="item.title">
        <v-expansion-panel-header>
          <h5>{{item.title}}</h5>
          <template v-slot:actions>
            <v-icon large>
              $expand
            </v-icon>
          </template>
        </v-expansion-panel-header>
        <v-expansion-panel-content>
          {{item.subtitle}}
        </v-expansion-panel-content>
      </v-expansion-panel>
      </v-col>
    </v-expansion-panels>


    <v-row>
      <v-col cols="12" sm="6">

        <p class="text1">Still have you any problem<br> for solutions?</p>

      </v-col>

      <v-col
        cols="12"
        md="6"
      >
        <br>
        <br>
        <br>
        <p>
          For any inquiries relating to 
          my Retail and Leadership Programs<br> or Coaching and Mentoring services feel free to speak to me<br> personally by call us during business hours.
        </p>


     
         
      </v-col>
    </v-row>

    <v-row>
      <v-col cols="12" sm="4">

        <v-card>
      
      <v-list two-line>
      <v-list-item>
        <v-list-item-icon>
          <v-icon color="indigo" large>
            mdi-phone
          </v-icon>
        </v-list-item-icon>

        <v-list-item-content>
          <v-list-item-title>(+94)444444444</v-list-item-title>
          <v-list-item-subtitle>Mobile</v-list-item-subtitle>
        </v-list-item-content>

        <v-list-item-icon>
          <v-icon> largemdi-message-text</v-icon>
        </v-list-item-icon>
      </v-list-item>

      <v-list-item>
        <v-list-item-action></v-list-item-action>

        <v-list-item-content>
          <v-list-item-title>(+94)71 555-6789</v-list-item-title>
          <v-list-item-subtitle>Work</v-list-item-subtitle>
        </v-list-item-content>

        <v-list-item-icon>
          <v-icon large color="blue lighten-3">mdi-message-text</v-icon>
        </v-list-item-icon>
      </v-list-item>

      <v-divider inset></v-divider>

      <v-list-item>
        <v-list-item-icon>
          <v-icon color="green" large>
            mdi-email
          </v-icon>
        </v-list-item-icon>

        <v-list-item-content>
          <v-list-item-title>claimpaul1@gmail.com</v-list-item-title>
          <v-list-item-subtitle>Office</v-list-item-subtitle>
        </v-list-item-content>
      </v-list-item>

      
      <v-divider inset></v-divider>

      <v-list-item>
        <v-list-item-icon>
          <v-icon color="red" large>
            mdi-map-marker
          </v-icon>
        </v-list-item-icon>

        <v-list-item-content>
          <v-list-item-title>30,Commercial Road,</v-list-item-title>
          <v-list-item-subtitle>Colombo</v-list-item-subtitle>
        </v-list-item-content>
      </v-list-item>
    </v-list>
  
        </v-card>

      </v-col>
      

      <v-col cols="12" sm="6" class="mx-12" >
        

        <faqMail/>


      </v-col>
    </v-row>
  
  </v-container>
</template>

<script>
import faqMail from './faqMail'
  export default {
    name: 'DashboardPanels',
    components:{faqMail},
    data: () => ({
      
        items1:[
          {title:'What should I include in my personal statement?',subtitle:'To Identify you uniquely'},
          {title:'Will membership plans be charged automatically?',subtitle:'No ,dont afraid'},
          {title:'How can I make a change to my application?',subtitle:'please contact us'},
        ] ,

          items2:[
          {title:'Where can I find out about funding?',subtitle:'you can ask nearest branch'},
          {title:'What will happen when I’ve sent my application?',subtitle:'we store your details for feutre needs'},
          {title:'Can I get a free trial before I purchase?',subtitle:'yes,you can get free trial for 30 days'},
        ] ,
    })
  
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Anton&display=swap');

p{
    font-size: 1.5rem;
}
.text1{

  font-family: 'Anton', sans-serif;
  font-size: 3rem;
}
</style>
