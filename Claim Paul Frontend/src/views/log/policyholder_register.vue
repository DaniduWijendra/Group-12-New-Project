<template>
<div>
  <Navbar/>
  <div class="home col-5 mx-auto py-5 mt-5">
    <h1 class="text-center">Register</h1>
    <div class="card">
      <div class="card-body">
        <div class="form-group">
          <label for="firstName">First Name:</label>
          <input
            type="text"
            v-model="form.firstName"
            class="form-control"
            id="firstName"
          />
          <span class="text-danger" v-if="errors.firstName">
            {{ errors.firstName[0] }}
          </span>
        </div>
        <div class="form-group">
          <label for="lastName">Last Name:</label>
          <input
            type="text"
            v-model="form.lastName"
            class="form-control"
            id="lastName"
          />
          <span class="text-danger" v-if="errors.lastName">
            {{ errors.lastName[0] }}
          </span>
        </div>
        <div class="form-group">
          <label for="email">Email address:</label>
          <input
            type="email"
            v-model="form.email"
            class="form-control"
            v-bind:class="{'is-invalid':errorEmail}"
            id="email"
          />
          <span class="text-danger" v-if="errors.email">
            {{ errors.email[0] }}
          </span>
           <div class="invalid-feedback text-danger">{{errorEmail}}</div>
        </div>


         <div class="form-group">
          
          <input
            type="hidden"
            class="form-control"
            id="role"
            :value='form.role'
          />
          
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
        <div class="form-group">
          <label for="password_confirmation">Confirm Password:</label>
          <input
            type="password"
            v-model="form.password_confirmation"
            class="form-control"
            id="password_confirmation"
          />
          <span class="text-danger" v-if="errors.password_confirmation">
            {{ errors.password_confirmation[0] }}
          </span>
        </div>
        <button
          type="submit"
          @click.prevent="register"
          class="btn btn-primary btn-block"
          
        >
          Register
        </button>
      </div>
    </div>
  </div>
</div>
</template>

<script>
import user from './api/user'
import Navbar from '../navbar'
import Axios from 'axios'
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
      errors: [],
      errorEmail:null,
    };
  },

  methods:{

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
                  
                  }

                 
        });

    

      
    }

  },
};
  
</script>