<template>
 <v-app>
     
                <Navbar/>
                
               
                
                
                
                <carousel/>

                <shopWrapper/>
                <garageWrapper/>
                <sparePrtWrapper/>

                
                <!-- photo / grid -->
                <section class="container section ">
                    <div class="row">
                    <div class="col s12 l4">
                        <v-img pa-2
  src="./assets/img/home/Group2.png" class="responsive-img materialboxed" 
></v-img>
                        
                    </div>
                    <div class="col s12 l6">
                        <br><br><br><br>
                        <h2 class="indigo-text text-darken-4">Vehicle damage</h2>
                        
                        <p class="pt-6">Our AI assesses car damage and 
                            expedites claims
                            and settlements today, in real time.</p>
                        <p><br>Every recovery starts with a visual appraisal. Our AI is trained on many millions of real<br> images of car accidents and repair operations, and understands auto damage as a<br> human appraiser would</p>
                    </div>
                    </div>
                    <div class="row">
                            <div class="col s12 l4 offset-l1 push-l6 pa-6">
                                <img src="./assets/img/home/Group1.svg" class="responsive-img materialboxed " ></v-img>
                            </div>
                            <div class="col s12 l6 offset-l1 pull-l5 right-align">
                                <h2 class="indigo-text text-darken-4">Claim instantly</h2>
                                <p>Immediate damage assessments means accelerated <br> triage from first  notice of loss - no total losses sent to the bodyshops, and a faster cycle for the policyholder.</p>
                            
                                <p>By applying our AI to claims, it now takes just minutes <br> to  assess damage and create estimates, instead of <br> days (or even weeks).</p>
                            </div> 

                    </div>
                    <div class="row">
                            <div class="col s12 l4">
                                <img src="./assets/img/home/introduction.svg" alt="" class="responsive-img materialboxed">
                            </div>
                            
                            <div class="col s12 l6 offset-l1">
                                <h2 class="indigo-text text-darken-4">Helpful</h2>
                                <p>Always willing to provide best service for <br> keep our clients happy.</p>
                            </div>
                    </div>
                </section>



            

            

                <div class="container">
                                <passage/>
                                <counter/>
                   
                                <Card/>
                                 <Parallax/>
                                 
                </div>
                <quote/>
                <footerParallax/>


                 <!-- parallax -->
                

                <!-- contact form -->
                    <!-- <section class="section container scrollspy" id="contact">
                        <div class="row">
                        <div class="col s12 l5">
                            <h2 class="indigo-text text-darken-4">Get in Touch</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum at lacus congue, suscipit elit nec, tincidunt orci.</p>
                            <p>Mauris dolor augue, vulputate in pharetra ac, facilisis nec libero. Fusce condimentum gravida urna, vitae scelerisque erat ornare nec.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum at lacus congue, suscipit elit nec, tincidunt orci.</p>
                            <p>Mauris dolor augue, vulputate in pharetra ac, facilisis nec libero. Fusce condimentum gravida urna, vitae scelerisque erat ornare nec.</p>
                        </div>
                        <div class="col s12 l5 offset-l2">
                            <form>
                            <div class="input-field">
                                <i class="material-icons prefix">email</i>
                                <input type="email" id="email">
                                <label for="email">Your Email</label>
                            </div>
                            <div class="input-field">
                                <i class="material-icons prefix">message</i>
                                <textarea id="message" class="materialize-textarea" cols="20" rows="20"></textarea>
                                <label for="message">Your Message</label>
                            </div>
                            <div class="input-field">
                                <i class="material-icons prefix">date_range</i>
                                <input type="text" id="date" class="datepicker">
                                <label for="date">Choose a date you need me for...</label>
                            </div>
                            <div class="input-field">
                                <p>Services required:</p>
                                <p>
                                <label>
                                    <input type="checkbox">
                                    <span>Photography</span>
                                </label>
                                </p>
                                <p>
                                <label>
                                    <input type="checkbox">
                                    <span>Photo Editing</span>
                                </label>
                                </p>
                            </div>
                            <div class="input-field center">
                                <button class="btn">Submit</button>
                            </div>
                            </form>
                        </div>
                        </div>
                    </section> -->

                     
                        <Footer/>
                              
        

              
                
  
  

       

    </v-app>
</template>

<script>

import Parallax from './views/Home/parallax'
import Footer from './views/footer'
import Navbar from './views/navbar'
import Card from './views/Home/cards'
import shopWrapper from './views/Home/shop_wrapper'
import garageWrapper from './views/Home/garage_wrapper'
import sparePrtWrapper from './views/Home/sparePrt_wrapper'
import carousel from './views/Home/carousel'
import footerParallax from './views/Home/footerParallax'
import counter from './views/Home/counter'
import quote from './views/Home/quote'
import passage from './views/Home/passage'
export default {
     
    components:{Parallax,Footer,Navbar,Card,shopWrapper,garageWrapper,sparePrtWrapper,carousel,footerParallax,counter,quote,passage}

   
}
</script>
<style scoped>
p{
    font-size:2rem;
}
</style>


 