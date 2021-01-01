<template>
    <v-app>
        <Navbar/>
         <h2 class="center blue-text text-darken-4">Contact Us</h2>
         <v-row>
              <v-col col="12" sm="12">
                  <v-img class="ma-5"
  src="../assets/img/home/contactus.jpg"
></v-img>
              </v-col>
         </v-row>
         <v-container>
             <v-row>
                 <v-col cols="12" sm="6">
                     <h2 class="heading">Face any problem? Inform Us</h2>
                     
                     <v-img class="ma-5" max-width="500px" src="../assets/img/home/contact.png"></v-img>
                 </v-col>
                 <v-col cols="12" sm="6"  >
                     
                        <h5 class="heading">We’re glad to discuss your organisation’s situation. 
                             So please contact us via the details below, or enter your request.</h5>
                             <contactMail/>
                   
                 </v-col>
             </v-row>
             <v-row>
                 <v-col cols="12" sm="4" v-for="(item, i) in listitem"
          :key="i">

          <v-hover
        v-slot="{ hover }"
        open-delay="200"
      >
                     <v-card class="mx-auto"  :elevation="hover ? 16 : 2"
          :class="{ 'on-hover': hover }">
    <v-list-item >
        <v-row>
        
        <v-icon left dark large color="green">{{item.icon}}</v-icon>
        
        
      <v-list flat>
      <v-list-item-group
       
      >
      <v-list-item>
           <v-list-item-content>
     
     
        <v-list-item-title class="headline mb-1"><b>{{item.title}}</b></v-list-item-title>
       <div>{{item.text}}</div>
        <!-- <v-list-item-subtitle>Greyhound divisely hello coldly fonwderfully</v-list-item-subtitle> -->
      </v-list-item-content>

      </v-list-item>
      </v-list-item-group>
      </v-list>
        
        </v-row>
    </v-list-item>
  </v-card>
          </v-hover>
                 </v-col>
                 <v-col cols="12" sm="12" md="12">
                    

                 </v-col>
             </v-row>
         </v-container>
         <div> <iframe width="100%" height="460px" src="https://maps.google.com/maps?hl=en&amp;q=matara+(Outlet Locations)&amp;ie=UTF8&amp;t=&amp;z=10&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
              </iframe></div>
        <footer>
            <Footer/>
        </footer>
    </v-app>
</template>

<script>
import Navbar from './navbar'
import Footer from './footer'
import contactMail from '../components/base/contactMail'
export default {

    components:{Navbar,Footer,contactMail},
    data:()=>(
        {
            listitem:[
                {icon:'mdi-map-marker',title:'Our Office Address',text:'No 85,Galle'},
                {icon:'mdi-email',title:'Mail Us',text:'claimpaul1@gmail.com'},
                {icon:'mdi-phone-in-talk',title:'Call for Help',text:'(+94) 777444555'}
            ]
        }
    )

    
}
</script>
<style scoped>
 @import url('https://fonts.googleapis.com/css2?family=Anton&display=swap');
 @import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap');
  
            .heading
            {
                font-family: 'Anton', sans-serif;
            }
            .text
            {
                font-family: 'Roboto Condensed', sans-serif;
            }
            
          
</style>




