<template>
<v-app>
    <Navbar/>

     <div class="home col-5 mx-auto pt-5 mt-5">
        <div class="alert alert-primary">
            <h1 class="text-center">Passsword Reset</h1>
            <form v-on:submit.prevent='sendToken'>
                <div class="form-group">
                    <label>Email</label>
                    <input
                    type="text"
                    placeholder='Email...'
                    class='form-control'
                    v-bind:class="{'is-invalid':errorEmail,'is-valid':infoEmail}"
                    v-model='email'>
                    <div class="invalid-feedback">{{errorEmail}}</div>
                     <div class="valid-feedback">{{infoEmail}}</div>
                </div>

                <button class='btn btn-primary'>Send Token to Email Address</button>
            </form>
        </div>

        <div class="alert alert-secondary">
            <form v-on:submit.prevent='validateToken'>
                <div class="form-group">
                    <label>Token</label>
                    <input
                    type="text"
                    placeholder="Token..."
                     class='form-control'
                    v-bind:class="{'is-invalid':errorToken,'is-valid':infoToken}"
                    v-model='token'>
                    <div class="invalid-feedback">{{errorToken}}</div>
                    <div class="valid-feedback">{{infoToken}}</div>
                </div>

                 <button type="submit" class="btn btn-secondary">Validate Token</button>
            </form>
        </div>

        <div class="alert alert-success" v-if='tokenValid'>
            <form v-on:submit.prevent='changePassword'>
                <div class="form-group">
                    <label>New Password</label>
                    <input
                    type="password"
                    placeholder="New Password..."
                     class='form-control'
                    v-bind:class="{'is-invalid':errorNewPassword}"
                    v-model='newPassword'>
                    <div class="invalid-feedback">{{errorNewPassword}}</div>
                </div>

                 <div class="form-group">
                    <label>Password Again</label>
                    <input
                    type="password"
                    placeholder="Password Again..."
                     class='form-control'
                    v-bind:class="{'is-invalid':errorPasswordAgain}"
                    v-model='passwordAgain'>
                    <div class="invalid-feedback">{{errorPasswordAgain}}</div>
                </div>

                <button type="submit" class="btn btn-success">Change Password</button>
            </form>
        </div>

          
            
    </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        
        <!-- <footer>
            <Footer></Footer>
        </footer> -->
</v-app>
</template>

<script>
import Navbar from '../navbar'
import Axios from '../../baseURL'
import Footer from '../footer.vue'
export default {
     components:{Navbar,Footer},
    data(){
        return{
            email:'',
            errorEmail:null,
            token:'',
            errorToken:null,
            newPassword:'',
            errorNewPassword:null,
            passwordAgain:'',
            errorPasswordAgain:null,
            tokenValid:false,
            infoEmail:null,
            infoToken:null,
            user:null,
        }

    },

    methods:{

        sendToken()
        {
            this.errorEmail=null;

            if(!this.email){

                this.errorEmail='Email Address is required'

            }

            if(!this.errorEmail)
            {
                const datas={
                    email:this.email
                }
            Axios.post('send_token',datas).then(()=>{

               this.infoEmail='Email Sent';

            }).catch(error=>{
                
                this.errorEmail=error.response.data.error;
          
            });

            }
        },

       validateToken(){

            this.errorToken=null;

            if(!this.token){

                this.errorToken='Token is required'

            }

             if(!this.errorToken)
            {
                const datas={
                    token:this.token
                }
            Axios.post('validate_token',datas).then(Response=>{
                
                if(Response.data.id)
                {
                    this.tokenValid=true;
                    this.infoToken='Token is Valid'
                    this.user=Response.data;
                }
            

            }).catch(error=>{
                
                this.errorToken=error.Response.data.error;
          
            });

            }


        },

        changePassword()
        {
            
            this.errorNewPassword=null;
            this.errorPasswordAgain=null;

            if(!this.newPassword){

                this.errorNewPassword='New Password is Invalid';

            }

             if(!this.passwordAgain){

                this.errorPasswordAgain='password confirmation is required';

            }

             if(this.newPassword !== this.passwordAgain){

                this.errorPasswordAgain='passwords do not match';

            }

             if(!this.errorNewPassword && !this.errorPasswordAgain)
            {
                const datas={
                    password:this.newPassword,
                    id:this.user.id,
                }
            Axios.post('reset_password',datas).then(()=>{
                
                    this.$router.push({path:'/login'});

            }).catch(error=>{
                
                console.log(error);
          
            });

            }
        }
    }
    
}
</script>