

<template>
 <div class="d-flex justify-center ">
    <v-app>
       
        <v-flex xs12 sm12 md12 lg12 >
             <v-card class="text-center ma-6" max-width="800" color="#3197b2">
               <v-alert type="error" v-if='errorEmail'>  {{errorEmail}}
                </v-alert>
                <v-card-title class="justify-center">
                         <h2 style="color:#fff; font-size:3rem">Registration Form</h2>
                </v-card-title>
                <v-card-text>
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
                                           <v-text-field prepend-icon="mdi-email" v-model="form.email" :rules="emailRules" label="E mail" required></v-text-field>
                                        </v-col>
                                        <v-col cols="12">
                                            <v-text-field v-model="form.password" prepend-icon="mdi-lock" :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'" :rules="[rules.required, rules.min]" :type="show1 ? 'text' : 'password'" name="input-10-1" label="Password" hint="At least 8 characters" counter @click:append="show1 = !show1"></v-text-field>
                                        </v-col>
                                        <v-col cols="12">
                                            <v-text-field block prepend-icon="mdi-lock" v-model="form.password_confirmation" :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'" :rules="[rules.required, passwordMatch]" :type="show1 ? 'text' : 'password'" name="input-10-1" label="Confirm Password" counter @click:append="show1 = !show1"></v-text-field>
                                        </v-col>
                                        <v-spacer></v-spacer>
                                        <v-col class="d-flex ml-auto" cols="12" sm="3" xsm="12">
                                            <v-btn x-large block :disabled="!valid" color="success" @click="register">Register</v-btn>
                                        </v-col>
                                    </v-row>
                                </v-form>
                            </v-card-text>
                        </v-card>
        </v-flex>
        
    </v-app>
    </div>  
</template>
<script>
import Axios from 'axios';
//import user from '../';
export default {
    data() {
    return {
      form: {
        firstName: "",
        lastName: "",
        email: "",
        role: "agent",
        password: "",
        password_confirmation: "",
      },
      verify: "",
      errorEmail:null,
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
          Axios.post('http://127.0.0.1:8000/api/register',this.form)
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
  .inputPrice input[type='number'] {
    -moz-appearance:textfield;
}
.inputPrice input::-webkit-outer-spin-button,
.inputPrice input::-webkit-inner-spin-button {
    -webkit-appearance: none;
}
</style>