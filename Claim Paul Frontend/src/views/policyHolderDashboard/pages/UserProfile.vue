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
                    v-model='policy_holder.fName'

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
                    v-model='policy_holder.lName'
                  />
                </v-col>

              </v-row>
              <v-row>
                <v-col cols="12">
                  <v-text-field
                    label="Adress"
                    outlined
                    prepend-icon="mdi-shield-home"
                    v-model='policy_holder.pAddress'
                  />
                </v-col>

                <v-col cols="12">
                  <v-text-field
                    label="Email" 
                    outlined
                    prepend-icon="mdi-at"                
                    type="email"
                    v-model='policy_holder.policyholder_email'
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
                    v-model="policy_holder.pDOB"
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
                    v-model='policy_holder.pGender'
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
                    v-model='policy_holder.pContactNo'
                  />
                </v-col>

                 <v-col
                  cols="12"
                  
                >
                  <v-text-field
                    label="NIC"
                    outlined
                    prepend-icon="mdi-card-account-details"
                    v-model='policy_holder.NIC'
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
          <v-col>
        <base-material-card
          class="v-card-profile"
          avatar='https://avataaars.io/?avatarStyle=Transparent&topType=LongHairNotTooLong&accessoriesType=Prescription01&hairColor=Black&facialHairType=Blank&clotheType=GraphicShirt&clotheColor=Pink&graphicType=Bear&eyeType=Side&eyebrowType=FlatNatural&mouthType=Serious&skinColor=Pale'
        >
                  <!-- avatar="https://demos.creative-tim.com/vue-material-dashboard/img/marc.aba54d65.jpg" -->
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

            <h4>Join with us & enjoy the <strong>Life</strong></h4>
          </v-card-text>
        </base-material-card>
        </v-col>
        </v-row>

      <v-row>
       <v-col >

        <v-img pa-2
         src="../../../assets/img/policyholder/profile.jpg" max-width="1500" max-height="400"></v-img>

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

        policy_holder:{
          fName:'',
          lName:'',
          pAddress:'',
          policyholder_email:'',
          pDOB:'',
          pGender:'',
          pContactNo:'',
          NIC:'',
        },
        
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
        Axios.get('get_policyholder/'+email).then(Response=>{
          this.policy_holder=Response.data[0];
          console.log(this.policy_holder);
        }).catch(error=>{
          console.log(error);
        });
    }
  }
  }
</script>
