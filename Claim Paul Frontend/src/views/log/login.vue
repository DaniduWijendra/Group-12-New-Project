<template>
    <v-app>
      <Navbar/>
        <div class="mx-3 mt-6 ">
             
                
                   <v-card class="text-center mx-5" max-width="600px" color="indigo lighten-4">
                    <v-card-title class="justify-center">
                            <h2 style="color:#fff; font-size:3rem">Login Form</h2>
                             </v-card-title>
                            <v-card-text>
                                <v-form ref="loginForm" v-model="valid" lazy-validation>
                                    <v-row>
                                          <v-col cols="12" class="mt-5" >
                                           <v-text-field outlined prepend-icon="mdi-at" v-model="form.email" :rules="emailRules" label="E-mail" required></v-text-field>
                                        </v-col>
                                         <v-col cols="12">
                                            <v-text-field outlined v-model="form.password" prepend-icon="mdi-lock" :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'" :rules="[rules.required, rules.min]" :type="show1 ? 'text' : 'password'" name="input-10-1" label="Password" hint="At least 8 characters" counter @click:append="show1 = !show1"></v-text-field>
                                        </v-col>
                                        <!-- <v-col class="d-flex" cols="12" sm="12" xsm="12">
                                        </v-col>
                                        <v-spacer></v-spacer> -->
                                        <v-col class="d-flex" cols="12" sm="12" md="12">
                                            <v-btn x-large block :disabled="!valid" color="deep-purple darken-4" @click="login"> Login </v-btn>
                                        </v-col>
                                        <!-- social media login -->
                                        <v-col cols="12" sm="12" md="12" >
                                           <v-btn x-large block color="indigo accent-3" dark @click="usingGoogle"> <v-icon dark left>facebook</v-icon> Sign Up with FaceBook </v-btn>
                                </v-col>
                                <v-col cols="12" sm="12" md="12" >
                                       <v-btn  x-large block dark @click="usingGoogle" color="red"> <v-icon  dark left>mdi-google</v-icon>+Sign Up with Google</v-btn></v-col>

                                        <v-col cols="12" sm="12" md="6" >
                                          <p class="alert alert-primary mx-3">

                                            <router-link to="/policyholder_register">Create Account</router-link>
                                          </p>

                                     
                                          </v-col>

                                        <v-col cols="12" sm="12" md="6" >
                                          

                                          <p class="alert alert-warning">
                                            <router-link to="/reset_password">Forget Password</router-link>
                                          </p>
                                            
                                        </v-col>
                                       
                                    </v-row>
                                </v-form> 
                            </v-card-text>
                   </v-card>
                

                <v-col col="12" sm="6"> 
                  <v-card class="text-center mx-5" max-width="600px" color="indigo lighten-4">
                 
                 </v-card>
                </v-col>
              
           
               

              
            
      
    </div>
    </v-app>

</template>

<script>
import Axios from '../../baseURL'
import user from './api/user.js'
import Navbar from '../navbar'

export default {
  components:{Navbar},
  data() {
    return {
      form: {
        email: "",
        password: "",
        device_name:"browser",
        
      },
      
    show1: false,
    rules: {
      required: value => !!value || "Required.",
      min: v => (v && v.length >= 8) || "Min 8 characters",
    },
    emailRules: [
      v => !!v || "Required",
      v => /.+@.+\..+/.test(v) || "E-mail must be valid"
    ],
       valid: true, 
      errors: [],
      user1:'',
    };
  },
  methods: {
      login() {
      user.login(this.form)
        .then(response => {
          this.$root.$emit("login", true);
           localStorage.setItem("token", response.data);

          //  setInterval(function(){
          //             localStorage.removeItem("token"); 
          //             window.location.replace("/login");}
          // , 3600000);

          
          //this.$router.push({name:'Policy Holder Dashboard' });
          this.getLogin();
        })
        .catch(error => {
          if (error.response.status === 422) {
            this.errors = error.response.data.errors;
             this.e('username or password incorrect');
          }
        });
    },
    usingGoogle()
    {
      Axios.get('login/google').then(Response=>{
       console.log(Response.data);
      }).catch(function(error){
          
              console.log(error);
            
        })
    },

    
    getLogin()
    {
      Axios.get('get_login/'+this.form.email).then(Response=>{
        this.user1=Response.data.users[0];

        console.log(this.user1.role);

        if(this.user1.role=='super_admin')
        {
            this.$router.push({path:'/super_admin'});
        }
        else if(this.user1.role=='admin'){
          this.$router.push({path:'/admin'});
        }
        else if(this.user1.role=='agent')
        {
           this.$router.push({path:'/agent'});
        }
        else if(this.user1.role=='policyholder')
        {
           this.$router.push({path:'/policyholder'});
        }
        else{
          this.e('username or password incorrect');
        }

      }).catch(function(error){
          
              console.log(error);
            
        })


    },

    usingGoogle()
    {
      Axios.get('google_login_callback').then(Response=>{

        console.log(Response.data);

      }).catch(error =>{

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
