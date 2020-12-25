<template>
    <v-app>
        <Navbar/>
         <h2 class="center blue-text text-darken-4">About Us</h2>
         <v-row>
              <v-col col="12" sm="12">
                  <v-img class="ma-5"
  src="../assets/img/home/aboutus.jpg" max-width="960"
></v-img>
              </v-col>
         </v-row>

         <v-row >
             <v-col col="12" sm="12" class="mb-6">
                                <v-btn
                                color="primary"
                                @click="e1 = 1"
                                >
                                Continue1
                                </v-btn>

                                 <v-btn
                                color="primary"
                                @click="e1 = 2"
                                >
                                Continue2
                                </v-btn>

                                 <v-btn
                                color="primary"
                                @click="e1 = 3"
                                >
                                Continue3
                                </v-btn>

             </v-col>
                                
             <v-col col="12" sm="4">

                   <v-stepper v-model="e1">
                            

                            <v-stepper-items>
                            <v-stepper-content step="1">
                                <v-card>
                                    <v-img class="ma-5"src="../assets/img/home/aboutus.jpg"></v-img>
                                </v-card>

                            </v-stepper-content>

                            <v-stepper-content step="2">
                                <v-card>
                                    <v-img class="ma-5"src="../assets/img/home/aboutus.jpg"></v-img>
                                </v-card>

                            </v-stepper-content>

                            <v-stepper-content step="3">
                                <v-card>
                                    <v-img class="ma-5"src="../assets/img/home/aboutus.jpg"></v-img>
                                </v-card>
                               
                            </v-stepper-content>

                            </v-stepper-items>
                        </v-stepper>

             </v-col>
         </v-row>
        <footer>
            <Footer/>
        </footer>
    </v-app>
</template>

<script>
import Navbar from './navbar'
import Footer from './footer'
export default {

    components:{Navbar,Footer},

    data(){
        return{
            e1: 1,
        }
    }
    
}
</script>

<style scoped>
 @import '../css/slider.css';
  .image{
            position: absolute;
            top:0;bottom:0;left:0;right:0;
            background-image: url(../assets/img/home/slider.svg);
            background-repeat: no-repeat;
            background-position: right bottom;
            background-size:contain;
            background-repeat: no-repeat;
                   
            }
</style>