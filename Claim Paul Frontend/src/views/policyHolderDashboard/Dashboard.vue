<template>
  <v-container
    id="dashboard"
    fluid
    tag="section"
  >
   <chartCard/>
    <v-row>
      
      <statusCard/>
       
    </v-row>

    <!-- events -->
  <v-row>

    <v-col col="12" sm="3">
      <event/>
    </v-col>
      
    <!-- end events -->


    <!-- calander -->
   <v-col col="12" sm="9">
     <base-material-card color="blue" height="800"> </base-material-card>
   </v-col>
  </v-row>

  <v-row>
    <v-col col="12">
      <Banner/>
    </v-col>
  </v-row>

  <v-row>
    <v-col col="12" sm="6">
      <timeLine/>
    </v-col>
    
    <v-col col="12" sm="6">
      <v-row>
        <v-col col="12">
          <base-material-card
          color="blue"
          title="Generate Cost Instructions "
          >
            <Stepper/>
        
          </base-material-card>
            
          
            <costAssits/>
          
        </v-col>
      </v-row>
      
    </v-col>

    
    <v-col col="12" sm="6">
      <base-material-card
      color="blue"
      icon="mdi-text-box-multiple-outline"
      title="Add Complains"
      class=" px-5 py-3"
      >

        
            <polyForm/>
          
        
      </base-material-card>
    </v-col>

    <v-col col="12" sm="6">
        <messageBox/>
    </v-col>
  </v-row>


  </v-container>
</template>

<script>
import User from '../log/api/user'
import Banner from './component/Banner'
import timeLine from './component/timeLine'
import Stepper from './component/stepper'
import chartCard from './component/chartCard'
import statusCard from './component/statusCard'
import event from './component/event'
import polyForm from './component/poltForm'
import costAssits from './component/costAssists'
import messageBox from './component/messageBox'
  export default {
    name: 'PolicyHolderDashboard',
    components:{Banner,timeLine,Stepper,chartCard,statusCard,event,polyForm,costAssits,messageBox},
    data () {
      return {
        user:null,
        
      }

  },

   

    mounted(){
      User.auth().then(Response=>{
        this.user=Response.data;
        console.log(this.user);
      });

      
    },

    
  }
</script>
