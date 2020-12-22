<template>
    <div>
  <v-layout row wrap>
      <v-flex xs12 sm6 md4 lg3 v-for="item in items" :key="item.title">
    <v-card
      class="text-lg-center ma-2"
      max-width="280"
    >
      <v-img
        :src="item.icon"
        height="200px"
      ></v-img>
    
  
      <v-card-title>
        {{item.title}}
      </v-card-title>
  
      <v-card-subtitle>
        {{item.subtitle}}
      </v-card-subtitle>
  
      <v-card-actions>
        <v-btn
          color="orange lighten-2"
          text
        to='/about'
        >
          Explore
        </v-btn>
  
        <v-spacer></v-spacer>
  
        <v-btn
          icon
          @click="item.showdetails = !item.showdetails"
        >
          <v-icon>{{ showdetails ? 'mdi-chevron-up' : 'mdi-chevron-down' }}</v-icon>
        </v-btn>
      </v-card-actions>
  
      <v-expand-transition>
        <div v-show="item.showdetails">
          <v-divider></v-divider>
  
          <v-card-text>
            {{item.text}}
          </v-card-text>
        </div>
      </v-expand-transition>
    </v-card>
      </v-flex>
        <!-- <v-flex xs12 sm6 md4 lg12>
       <v-card class="mx-auto" outlined>
    <v-list-item three-line>
      <v-list-item-content>
        <div class="overline mb-4">OVERLINE</div>
        <v-list-item-title class="headline mb-1">Headline 5</v-list-item-title>
        <v-list-item-subtitle>Greyhound divisely hello coldly fonwderfully</v-list-item-subtitle>
      </v-list-item-content>

      <v-list-item-avatar tile size="80" color="grey"></v-list-item-avatar>
    </v-list-item>

    <v-card-actions>
      <v-btn text>Button</v-btn>
      <v-btn text>Button</v-btn>
    </v-card-actions>
  </v-card>
        </v-flex> -->
  </v-layout>
</div>
</template>
<script>
export default {

  data: () => ({
    showdetails:false,
    items:[
        {title:' Vehicle Cost Prediction',subtitle:' Find estimate cost',text:'You can estimate your damage car cost using claim paul. Upload images of the car and claim paul is ready to estimate your cost',icon:require('@/assets/img/home/cardfirst.jpg') ,showdetails:false},
        {title:' Find Garage',subtitle:'View nearest garage',text:'Need a garage? Claim paul is ready for find the nerest and recommended garages nearby location.',icon:require('@/assets/img/home/servicefirst.png'),showdetails:false},
        {title:' Find Spare Parts',subtitle:'View nearest spare parts shops',text:'Are you looking spare parts for your vehicle. Claim paul can find you to best shop for you nearby your location',icon:require('@/assets/img/home/servicesecond.png'),showdetails:false},
        {title:' FAQ',subtitle:'Frequently Asked Questions',text:'Questions related to site',icon:require('@/assets/img/home/faq.png'),showdetails:false}
    ]
  }),
}
</script>
