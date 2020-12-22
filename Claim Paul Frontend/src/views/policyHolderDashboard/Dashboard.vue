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
     <base-material-card color="blue" height="800"> 
     
        <v-img pa-2
         src="../../assets/img/policyholder/policihld1.jpg" max-width="1500" max-height="500"></v-img>

         <div class="dropbox">

           <p>Please stay with us ,We do simple your life</p>

         </div>
     </base-material-card>
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

<style scoped>
 .dropbox {
    outline: 2px dashed grey; /* the dash box */
    outline-offset: -15px;
     background: rgb(245, 195, 232);
    border-radius: 2em;
    color: black;
    padding: 10px 10px;
    min-height:250px; /* minimum height */
    position: relative;
    cursor: pointer;
    
  }



  .dropbox p {
    font-size: 2.2em;
    text-align: center;
    padding: 50px 0;
  }
</style>
