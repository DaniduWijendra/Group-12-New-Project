<template>
<div>
  <Navbar/>
  <div class="home col-5 mx-auto py-5 mt-5 ">
    <h1 class="text-center">Login</h1>
    <div class="card">
      <div class="card-body">
        <div class="form-group">
          <label for="email">Email address:</label>
          <input
            type="email"
            v-model="form.email"
            class="form-control"
            id="email"
          />
          <span class="text-danger" v-if="errors.email">
            {{ errors.email[0] }}
          </span>
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input
            type="password"
            v-model="form.password"
            class="form-control"
            id="password"
          />
          <span class="text-danger" v-if="errors.password">
            {{ errors.password[0] }}
          </span>
        </div>
        <button @click.prevent="login" class="btn btn-primary btn-block">
          Login
        </button>
        <button @click.prevent="usingGoogle" class="btn red btn-block">
          using Google
        </button>
        <br>
         <span class='alert alert-primary'><a href="/policyholder_register">create account here</a></span>
         <span class='alert alert-danger ml-2'><a href="/reset_password">forgot password </a></span>
      </div>

     
    </div>
  </div>
</div>
</template>

<script>
import Axios from 'axios'
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
      errors: [],
      user1:'',
    };
  },

  methods:{
     login() {
      user.login(this.form)
        .then(response => {
          this.$root.$emit("login", true);
           localStorage.setItem("token", response.data);

           setInterval(function(){
                      localStorage.removeItem("token"); 
                      window.location.replace("/login");}
          , 3600000);

          
          //this.$router.push({name:'Policy Holder Dashboard' });
          this.getLogin();
        })
        .catch(error => {
          if (error.response.status === 422) {
            this.errors = error.response.data.errors;
          }
        });
    },

    
    getLogin()
    {
      Axios.get('http://127.0.0.1:8000/api/get_login/'+this.form.email).then(Response=>{
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
      Axios.get('http://127.0.0.1:8000/api/google_login_callback').then(Response=>{

        console.log(Response.data);

      }).catch(error =>{

      });
    }

  } ,

 
}
</script>