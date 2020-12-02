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
              Edit Profile
            </div>

            <div class="subtitle-1 font-weight-light">
              Complete your profile
            </div>
          </template>

          <v-form>
            <v-container class="py-0">
              <v-row>
               
                <v-col
                  cols="12"
                  md="4"
                >
                  <v-text-field
                    label="NIC"
                    class="purple-input"
                    v-model='editedItem.NIC'

                  />
                </v-col>
              </v-row>
              <v-row>
                <v-col
                  cols="12"
                  md="6"
                >
                  <v-text-field
                    label="First Name"
                    class="purple-input"
                    v-model='editedItem.fName'
                  />
                </v-col>

                <v-col
                  cols="12"
                  md="6"
                >
                  <v-text-field
                    label="Last Name"
                    class="purple-input"
                    v-model='editedItem.lName'
                  />
                </v-col>

                <v-col cols="12">
                  <v-text-field
                    label="Adress"
                    class="purple-input"
                    v-model='editedItem.pAddress'
                  />
                </v-col>

                <v-col cols="12">
                  <v-text-field
                    label="Email"
                    class="purple-input"
                    type="email"
                    v-model='editedItem.policyholder_email'
                  />
                </v-col>

                <v-col
                  cols="12"
                  md="4"
                >
                  <v-text-field
                    class="purple-input"
                    label="Birth Date"
                    type="number"
                  />
                </v-col>

                <v-col
                  cols="12"
                  md="4"
                >
                  <v-text-field
                    label="Gender"
                    class="purple-input"
                    v-model='editedItem.pGender'
                  />
                </v-col>

                <v-col
                  cols="12"
                  md="4"
                >
                  <v-text-field
                    label="Contact No"
                    class="purple-input"
                    v-model='editedItem.pContactNo'
                  />
                </v-col>

             

                <v-col cols="12">
                  <v-textarea
                    class="purple-input"
                    label="About Me"
                    value="I am proud of me ."
                  />
                </v-col>

                <v-col
                  cols="12"
                  class="text-right"
                >
                  <v-btn
                    color="success"
                    class="mr-0"
                  >
                    Update Profile
                  </v-btn>
                </v-col>
              </v-row>
            </v-container>
          </v-form>
        </base-material-card>
      </v-col>

      <v-col
        cols="12"
        md="4"
      >
        <base-material-card
          class="v-card-profile"
          avatar="https://demos.creative-tim.com/vue-material-dashboard/img/marc.aba54d65.jpg"
        >
          <v-card-text class="text-center" v-if='user'>
            <h6 class="display-1 mb-1 grey--text" >
              {{user.role}}
            </h6>

            <h4 class="display-2 font-weight-light mb-3 black--text">
              {{user.firstName}} {{user.lastName}}
            </h4>

            <p class="font-weight-light grey--text">
              Don't be scared of the truth because we need to restart the human foundation in truth
               And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
            </p>

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
  export default {

    data(){
      return{
        user:null,

        editedItem:{
         
          NIC:'',
          fName:'',
          lName:'',
           policyholder_email:'',
           pContactNo:'',
           pGender:'',
           pDOB:'',
           pAddress:'',


        },
      }
    },
     mounted(){
      User.auth().then(Response=>{
        this.user=Response.data;
        console.log(this.user);
      })
    },

    created()
    {
      
    }
  }
</script>
