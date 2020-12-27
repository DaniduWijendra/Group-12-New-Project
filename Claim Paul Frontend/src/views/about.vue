<template>
    <v-app>
        <Navbar/>
        
         <h2 class="center blue-text text-darken-4">About Us</h2>
         <v-row>
              <v-col col="12" sm="12">
                  <v-img class="ma-5"
  src="../assets/img/home/aboutus.jpg" max-width="960"
></v-img>
              </v-col>
         </v-row>

              <v-container>
                  <v-row>
              <v-col col="12" xs12 sm6 md6 lg6>
                  <h2 class="heading">You can depend on us to get a good services</h2>
                  <!-- <v-row
    align="center"
    justify="space-around"
  > -->
  <!-- buttons -->
  <v-col col="12" sm12 class="mb-6">
                                <v-btn v-bind:color="type==='first' ? 'secondary' : 'blue darken-2'"
                                large @click="e1 = 1;type='first'">
                                <v-icon left dark large color="white">
       mdi-account-tie
      </v-icon>
                                Our Values
                                </v-btn>

                                 <v-btn v-bind:color="type==='second' ? 'secondary' : 'blue darken-2'"
                                large @click="e1 = 2;type='second'">
                                <v-icon left dark large color="white">
       mdi-rocket
      </v-icon>Mission
                                </v-btn>

                                 <v-btn
                                 v-bind:color="type==='third' ? 'secondary' : 'blue darken-2'"
                                large @click="e1 = 3;type='third'" >
                                <v-icon left dark large color="white" >
       mdi-bullseye-arrow
      </v-icon>Goals
        </v-btn>

             </v-col>
                                
             <v-col col="12" sm12 md6>
                 <!-- content -->
                   <v-stepper v-model="e1">
                            

                            <v-stepper-items>
                            <v-stepper-content step="1">
                                <!-- <v-card>
                                    <v-avatar size="200">
            <v-img src='../assets/img/home/aboutus.jpg'></v-img>
          </v-avatar>
          
                                    
                                </v-card> -->
                                  <v-card class="mx-auto" outlined>
    <v-list-item>
        <v-row>
        <v-col cols="12" col12 sm="6">
        <v-list-item-avatar round size="200" color="grey"><v-img src='../assets/img/home/aboutus.jpg'></v-img></v-list-item-avatar>
        </v-col>
        <v-col cols="12" col12 sm="6">
      <v-list flat>
      <v-list-item-group
        v-model="model"
        color="indigo"
      >
      <v-list-item v-for="(item, i) in listitem"
          :key="i">
           <v-list-item-content>
      <v-list-item-icon>
          <v-icon left dark large color="green">{{item.icon}}</v-icon>
      </v-list-item-icon>
     
        <v-list-item-title class="headline mb-1">{{item.first}}</v-list-item-title>
       
        <!-- <v-list-item-subtitle>Greyhound divisely hello coldly fonwderfully</v-list-item-subtitle> -->
      </v-list-item-content>

      </v-list-item>
      </v-list-item-group>
      </v-list>
        </v-col>
        </v-row>
    </v-list-item>
  </v-card>
                                

                            </v-stepper-content>

                            <v-stepper-content step="2">
                                <v-card class="mx-auto" outlined>
    <v-list-item>
        <v-row>
        <v-col cols="12" col12 sm="6">
        <v-list-item-avatar round size="200" color="grey"><v-img src='../assets/img/home/aboutus.jpg'></v-img></v-list-item-avatar>
        </v-col>
        <v-col cols="12" col12 sm="6">
      <v-list flat>
      <v-list-item-group
        v-model="model"
        color="indigo"
      >
      <v-list-item v-for="(item, i) in listitem"
          :key="i">
           <v-list-item-content>
      <v-list-item-icon>
          <v-icon left dark large color="green">{{item.icon}}</v-icon>
      </v-list-item-icon>
     
        <v-list-item-title class="headline mb-1">{{item.second}}</v-list-item-title>
       
        <!-- <v-list-item-subtitle>Greyhound divisely hello coldly fonwderfully</v-list-item-subtitle> -->
      </v-list-item-content>

      </v-list-item>
      </v-list-item-group>
      </v-list>
        </v-col>
        </v-row>
    </v-list-item>
  </v-card>

                            </v-stepper-content>

                            <v-stepper-content step="3">
                               <v-card class="mx-auto" outlined>
    <v-list-item>
        <v-row>
        <v-col cols="12" col12 sm="6">
        <v-list-item-avatar round size="200" color="grey"><v-img src='../assets/img/home/aboutus.jpg'></v-img></v-list-item-avatar>
        </v-col>
        <v-col cols="12" col12 sm="6">
      <v-list flat>
      <v-list-item-group
        v-model="model"
        color="indigo"
      >
      <v-list-item v-for="(item, i) in listitem"
          :key="i">
           <v-list-item-content>
      <v-list-item-icon>
          <v-icon left dark large color="green">{{item.icon}}</v-icon>
      </v-list-item-icon>
     
        <v-list-item-title class="headline mb-1">{{item.third}}</v-list-item-title>
       
        <!-- <v-list-item-subtitle>Greyhound divisely hello coldly fonwderfully</v-list-item-subtitle> -->
      </v-list-item-content>

      </v-list-item>
      </v-list-item-group>
      </v-list>
        </v-col>
        </v-row>
    </v-list-item>
  </v-card>
                               
                            </v-stepper-content>

                            </v-stepper-items>
                        </v-stepper>

             </v-col>
    
    <!-- <v-btn tile v-for="item in items" :key="item.title" large><v-icon
        left
        dark
        large
        color="red"
      >
        {{item.icon}}
      </v-icon>{{item.title}}</v-btn> -->
    
  
  <!-- </v-row> -->
              </v-col>
              <v-col col="12" xs12 sm6 md6 lg6>
                   <v-card
    class="mx-auto"
  >
    <v-img
      class="white--text align-end"
      src="../assets/img/home/aboutus.jpg"
    >
      <v-card-title>Claim Paul Will Always With You</v-card-title>
    </v-img>

    <v-card-subtitle class="gray-text">
      Our Strory
    </v-card-subtitle>

    <v-card-text class="text--primary">
      <div>Claim Paul develops artificial intelligent for accident and disaster recovery.
        Our AI looks at photos of damage and predicts repair costs. We are applying 
        our AI today to tangible problems that affects thousand of people accross the country 
        every day,and making difference by restoring their livelihoods more quickly and efficienty.
        Our technology is patented and trained on largest dataset in industry. 
      </div><br>
      <div><b>We are commited to providing prompt and standalized service to any vehicle insurance on repair parts on vehicle accident.Our own team experienced,efficient service provide from 
          all over country enables us to continue providing services in very orderly manner.</b> 
      </div>

     
    </v-card-text>
  </v-card>

              </v-col>
              
         </v-row>
        </v-container>
        <footer>
            <Footer/>
        </footer>
    </v-app>
</template>

<script>
import Navbar from './navbar'
import Footer from './footer'
export default {
    data: () => ({
        e1:'1',
        type:'',
        model:'1',
        
    showdetails:false,
    items:[
        {title:'Our Values',icon:' Find estimate cost',icon:'mdi-car',showdetails:false},
        {title:'Mission',icon:'mdi-rocket'},
        {title:'Company Goals',icon:'flaticon-start-button'},
        
    ],
    listitem:[
        {first:'Teamwork',second:'Give our Best',third:'Customer Satisty',icon:'mdi-chevron-double-right'},
        {first:'Respect clients',second:'Best Service',third:'Bring Innovation',icon:'mdi-chevron-double-right'},
        {first:'24X7 Available',second:'More Productive',third:'Creative Minds',icon:'mdi-chevron-double-right'},
        {first:'Truethfullness',second:'Feasible Energy',third:'Best Experience',icon:'mdi-chevron-double-right'},
        
    ]
  }),
    components:{Navbar,Footer},
    
}
</script>

<style scoped>
 @import '../css/slider.css';
 @import url('https://fonts.googleapis.com/css2?family=Anton&display=swap');
  .image{
            position: absolute;
            top:0;bottom:0;left:0;right:0;
            background-image: url(../assets/img/home/slider.svg);
            background-repeat: no-repeat;
            background-position: right bottom;
            background-size:contain;
            background-repeat: no-repeat;
                   
            }
            .heading
            {
                font-family: 'Anton', sans-serif;
            }
            
          
</style>