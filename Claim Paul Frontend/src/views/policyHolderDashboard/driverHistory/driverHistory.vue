<template>
  <v-container
    id="dashboard"
    fluid
    tag="section"
  >
    <v-row>
      <v-col col="12" sm="6">
      <v-card>
        <v-card-text>
          <div class="font-weight-bold ml-8 mb-2" v-if="user">
            {{user.firstName}} {{user.lastName}}
            <div>Total Reports: {{data.length}}</div>
          </div>
          
          <v-timeline
            align-top
            dense
          >
            <v-timeline-item
              v-if="l>0"
              v-for="datas in data"
              :key="data.rId"
              small
            >
              <div>
               
                <div class="font-weight-normal textf">
                  
                 Vehicle Number: <strong>{{ datas.vehicleNumber }}</strong></br> 
                 Cost:<strong> Rs     {{ datas.rCost }}.00</strong></br>
                 Date:<strong> {{ datas.rDate }}</strong></br>
                 Place:<strong> {{ datas.place }}</strong></br>

                </div>
               
              </div>
             </v-timeline-item>
            <v-timeline-item v-if="l==0">
                 <div class="px-6">
                    <div class="alert alert-danger">No Driver History yet</div>
                </div>
            </v-timeline-item>

            
          </v-timeline>
        </v-card-text>
      </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import Axios from '../../../baseURL'
import User from '../../log/api/user'
export default {
    data: () => ({
      data:[],
      user:null,
      l:'',
      
    }),

     mounted(){
      User.auth().then(Response=>{
        this.user=Response.data;
        this.getDriverHistory(this.user.email);
      
        
      });

      
    },

    methods:{

      getDriverHistory(email){
        Axios.get('get_driver_history/'+email).then(Response=>{

          this.data=Response.data;
          this.l=this.data.length;
          if(this.l>0)
          {
            this.s("driver history loaded");
          }
          else{
            this.e("!!Sorry,No driver history yet,for you");
          }
        
          
        }).catch(function(error){
          
              console.log(error);
            
        })
      }
    },

    
  }
</script>

<style>

  .textf{
    outline: 2px dashed grey; /* the dash box */
    outline-offset: -10px;
    background: lightcyan;
    color: dimgray;
    padding: 10px 10px;
    min-height: 200px; /* minimum height */
    position: relative;
    cursor: pointer;
    padding-left:25px;
    padding-top:15px;
    
  }

</style>