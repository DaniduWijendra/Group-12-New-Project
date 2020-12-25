<template>
  <v-container
    id="user-profile"
    fluid
    tag="section"
  >
    <v-row justify="center">
      <v-col
        cols="12"
        md="8"
      >
        <base-material-card color='blue'>
          <template v-slot:heading>
            <div class="display-2 font-weight-light">
              User Profile
              
            </div>

            <div class="subtitle-1 font-weight-light">
              your profile
            </div>
          </template>

          
            <v-container class="py-0">
               <v-row>
               
                <v-col
                  cols="12"
                  md="4"
                >
                  <v-text-field
                  outlined
                    prepend-icon="mdi-account-star"
                    label="First Name"
                    v-model='agent.fName'

                  />
                </v-col>
            
              
              
                <v-col
                  cols="12"
                  md="4"
                >
                  <v-text-field
                  outlined
                    prepend-icon="mdi-account-star-outline"
                    label="Last Name"
                    v-model='agent.lname'
                  />
                </v-col>

              </v-row>
              <v-row>
                <v-col cols="12">
                  <v-text-field
                    label="Adress"
                    outlined
                    prepend-icon="mdi-shield-home"
                    v-model='agent.agAddress'
                  />
                </v-col>

                <v-col cols="12">
                  <v-text-field
                    label="Email" 
                    outlined
                    prepend-icon="mdi-at"                
                    type="email"
                    v-model='agent.email'
                  />
                </v-col>

                <v-col
                  cols="12"
                  md="4"
                >
                  <v-text-field
                    label="Birth Date"
                    outlined
                    prepend-icon="mdi-cake-variant"
                    v-model="agent.agDob"
                  />
                </v-col>

                <v-col
                  cols="12"
                  md="4"
                >
                  <v-text-field
                    label="Gender"
                    outlined
                    prepend-icon="mdi-account-switch"
                    v-model='agent.agGender'
                  />
                </v-col>

                <v-col
                  cols="12"
                  md="4"
                >
                  <v-text-field
                    label="Contact No"
                    outlined
                    prepend-icon="mdi-phone-message"
                    v-model='agent.agContactNo'
                  />
                </v-col>

                 <v-col
                  cols="12"
                  
                >
                  <v-text-field
                    label="Branch"
                    outlined
                    prepend-icon="mdi-source-branch"
                    v-model='agent.agBranch'
                  />
                </v-col>

             

                <v-col cols="12">
                  <v-textarea
                    label="About Me"
                    value="I am proud of me ."
                  />
                </v-col>

               
              </v-row>
            </v-container>
        
        </base-material-card>
      </v-col>

      <v-col
        cols="12"
        md="4"
      >
        <v-row>
        <base-material-card
          class="v-card-profile"
          
          avatar="https://gravatar.com/avatar/1a6a66021ada4f0804ff1c81ee39861d?s=400&d=robohash&r=x"
        >
          <v-card-text class="text-center" v-if='user'>
            <h6 class="display-1 mb-1 grey--text" >
              {{user.role}}
            </h6>

            <h4 class="display-2 font-weight-light mb-3 black--text">
              {{user.firstName}} {{user.lastName}}
            </h4>

            
            <v-btn
              color="blue"
              rounded
              class="mr-0"
            >
              Follow
            </v-btn>
          </v-card-text>
        </base-material-card>
        </v-row>
        <v-row>
          <v-col>
            <v-img pa-2
         src="../../../assets/img/agent/profile.jpg" max-width="1500" max-height="400"></v-img>
          </v-col>
        </v-row>
      </v-col>
      

    </v-row>
  </v-container>
</template>

<script>
import User from '../../log/api/user'
import Axios from '../../../baseURL'
  export default {

    data(){
      return{
        user:null,

        agent:{},
        
        
      }
    },
     mounted(){
      User.auth().then(Response=>{
        this.user=Response.data;
        this.getAgent(this.user.email);
        console.log(this.user);
      })
    },

  methods:{
    getAgent(email)
    {
        Axios.get('get_agent/'+email).then(Response=>{
          this.agent=Response.data[0];
          console.log(this.agent);
        }).catch(error=>{
          console.log(error);
        });
    }
  }
  }
</script>
