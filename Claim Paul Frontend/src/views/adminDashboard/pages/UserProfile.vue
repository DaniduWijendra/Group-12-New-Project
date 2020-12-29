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
              Your profile
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
                    v-model='admin.fName'
                    readonly
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
                    v-model='admin.lName'
                    readonly
                  />
                </v-col>

              </v-row>
              <v-row>
                <v-col cols="12">
                  <v-text-field
                    label="Adress"
                    outlined
                    prepend-icon="mdi-shield-home"
                    v-model='admin.adminAddress'
                    readonly
                  />
                </v-col>

                <v-col cols="12">
                  <v-text-field
                    label="Email" 
                    outlined
                    prepend-icon="mdi-at"                
                    type="email"
                    v-model='admin.adminEmail'
                    readonly
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
                    v-model="admin.adminDOB"
                    readonly
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
                    v-model='admin.adminGender'
                    readonly
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
                    v-model='admin.adminContactNo'
                    readonly
                  />
                </v-col>

                 <v-col
                  cols="12"
                  
                >
                  <v-text-field
                    label="Branch"
                    outlined
                    prepend-icon="mdi-source-branch"
                    v-model='admin.adminBranch'
                    readonly
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
        <base-material-card
          class="v-card-profile"
          avatar='https://avataaars.io/?avatarStyle=Transparent&topType=ShortHairShortFlat&accessoriesType=Prescription01&hairColor=Black&facialHairType=BeardLight&facialHairColor=Black&clotheType=Hoodie&clotheColor=Blue02&eyeType=Squint&eyebrowType=Angry&mouthType=Default&skinColor=Pale'
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

        admin:{},
        
      }
    },
     mounted(){
      User.auth().then(Response=>{
        this.user=Response.data;
        this.getAdmin(this.user.email);
        console.log(this.user);
      })
    },

  methods:{
    getAdmin(email)
    {
        Axios.get('get_admin/'+email).then(Response=>{
          this.admin=Response.data[0];
          console.log(this.admin);
        }).catch(error=>{
          console.log(error);
        });
    }
  }
  }
</script>
