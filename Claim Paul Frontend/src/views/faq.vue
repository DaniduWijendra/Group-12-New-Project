<template>
    <v-app>
        <Navbar/>
        <h2 class="center blue-text text-darken-4">FAQ</h2>
         <!-- <section class="claimpaul-banner">
                    <div class="slider">
                        <div class="slide">
                            <div class="content-holder">
                                

                                    <div class="content">
                                        <div class="row">
                                            <div class="col12 xs12 s6">
                                                <div class="sub-content col px-md-5">

                                                    

                                                </div>
                                            </div>

                                            <div class="col12 xs12 s6">
                                                <div class="image responsive-img">

                                                </div>

                                            </div>
                                            
                                    

                                        </div>



                                    </div>
                              
                            </div>
                            
                            
                        </div>
                    </div>

                </section> -->
             <v-row>
              <v-col col="12" sm="12">
                  <v-img class="ma-5"
  src="../assets/img/home/faq.jpg"
></v-img>
              </v-col>
         </v-row>
            <v-container>
                <Tab/>
            </v-container> 
                
        
        <footer>
            <Footer/>
        </footer>
    </v-app>
</template>

<script>
import Navbar from './navbar'
import Footer from './footer'
import Tab from '../components/base/Tabs'
export default {

    components:{Navbar,Footer,Tab},
    
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