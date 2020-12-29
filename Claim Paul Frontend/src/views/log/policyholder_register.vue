
<template>
<v-app>
<Navbar/>

 <v-row class="bgs" >
    
   <v-col cols="12" sm="6">    
        <!-- <v-flex xs12 sm12 md12 lg12 > -->
             <v-card class="text-center ma-12" max-width="800" color="indigo lighten-4">
               <v-alert type="error" v-if='errorEmail'>
                    {{errorEmail}}
               </v-alert>
               
                <v-card-title class="justify-center">
                         <h2 style="color:#fff; font-size:3rem">Registration Form</h2>
                </v-card-title>
                <v-card-text>
                  <!-- <span v-if='errorEmail' class="text-danger">{{errorEmail}}</span> -->
                    <v-form ref="registerForm" v-model="valid" lazy-validation>
                        <v-row>
                                        <!-- normal sign up begins -->
                                        <v-col cols="12">
                                           <v-text-field prepend-icon="mdi-form-textbox" v-model="form.firstName" :rules="[rules.required,rules.namelength]" label="First Name" maxlength="20" required></v-text-field>
                                        </v-col>
                                        <v-col cols="12" >
                                            <v-text-field prepend-icon="mdi-form-textbox" v-model="form.lastName" :rules="[rules.required,rules.namelength]" label="Last Name" maxlength="20" required></v-text-field>
                                        </v-col>
                                        <v-col cols="12">
                                           <v-text-field
                                            prepend-icon="mdi-email" 
                                            v-model="form.email" 
                             
                                            :rules="emailRules" 
                                            label="E mail" required>
                                          </v-text-field>
                                        </v-col>
                                        <v-col cols="12">
                                            <v-text-field v-model="form.password" prepend-icon="mdi-lock" :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'" :rules="[rules.required, rules.min]" :type="show1 ? 'text' : 'password'" name="input-10-1" label="Password" hint="At least 8 characters" counter @click:append="show1 = !show1"></v-text-field>
                                        </v-col>
                                        <v-col cols="12">
                                            <v-text-field block prepend-icon="mdi-lock" v-model="form.password_confirmation" :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'" :rules="[rules.required, passwordMatch]" :type="show1 ? 'text' : 'password'" name="input-10-1" label="Confirm Password" counter @click:append="show1 = !show1"></v-text-field>
                                        </v-col>
                                        <v-spacer></v-spacer>
                                        <v-col class="d-flex ml-auto" cols="12" sm="3" xsm="12">
                                            <v-btn x-large block :disabled="!valid" color="deep-purple darken-4" @click="register">Register</v-btn>
                                        </v-col>
                                    </v-row>
                                </v-form>
                            </v-card-text>
                        </v-card>
                    </v-col>

                    <v-col cols="12" sm="6">

                      <img src="../../assets/img/home/brain.svg" style="width:500px;height:500px;" class="responsive-image" alt="">
                      <p class='s'>Join with us and be Smart</p>

                    </v-col>
        <!-- </v-flex> -->
        
    
    </v-row> 
    </v-app>
</template>
<script>

import user from './api/user'
import Navbar from '../navbar'
import Axios from '../../baseURL'
export default {
  components:{Navbar},

    data() {
    return {
      form: {
        firstName: "",
        lastName: "",
        email: "",
        role: "policyholder",
        password: "",
        password_confirmation: "",
      },
      errorEmail:null,

      verify: "",
        valid: true,
      loginEmailRules:
    [
      v => !!v || "Required",
      v => /.+@.+\..+/.test(v) || "E-mail must be valid"
    ],
    emailRules: [
      v => !!v || "Required",
      v => /.+@.+\..+/.test(v) || "E-mail must be valid"
    ],

    show1: false,
    rules: {
      required: value => !!value || "Required.",
      min: v => (v && v.length >= 8) || "Min 8 characters",
      namelength: v => (v && v.length >= 3) || "Min 3 characters",
    },
      errors: []
    };
  },
  computed: {
    passwordMatch() {
      return () => this.form.password === this.form.password_confirmation || "Password must match";
    },
  },
  methods: {
    register(){

      

          //user.register(this.form)
          Axios.post('register',this.form)
          .then(()=>{
            this.$router.push({name:'login'});
          })
          .catch(error => {
            
                  if (error.response.status === 422) {
                    this.errors = error.response.data.errors;
                  
                  }

                  if (error.response.status === 401) {
                    this.errorEmail=error.response.data.error;
                  console.log(this.errorEmail);
                  }

                 
        });

      

      
    },
    reset() {
      this.$refs.form.reset();
    },
    resetValidation() {
      this.$refs.form.resetValidation();
    }
  },
}
</script>

<style>

@import url('https://fonts.googleapis.com/css2?family=Anton&family=Langar&display=swap');
  .inputPrice input[type='number'] {
    -moz-appearance:textfield;
}
.inputPrice input::-webkit-outer-spin-button,
.inputPrice input::-webkit-inner-spin-button {
    -webkit-appearance: none;
}

.bgs{
  background-color: indigo;
}

.s{

  font-family: 'Anton', sans-serif;
font-family: 'Langar', cursive;
font-size: 4rem;
color:azure;

}
</style>