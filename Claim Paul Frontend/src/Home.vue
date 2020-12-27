<template>
 <v-app>
     
                <Navbar/>
                
                <!-- <section class="claimpaul-banner">
                    <div class="slider">
                        <div class="slide">
                            <div class="content-holder">
                                

                                    <div class="content">
                                        <div class="row">
                                            <div class="col12 xs12 s6">
                                                <div class="sub-content col px-md-5">

                                                    <!-- <div class="title">
                                                       <h1 class="display-">Claim Paul</h1>
                                                    </div>

                                                    <div class="sub-title">
                                                        Welcome to claim Paul!!!
                                                    </div> -->

                                                    <!-- <div class="btn-sign-up"></div>
                                                    <div class="btn-get-started"></div>

                                                </div>
                                            </div>

                                            <div class="col12 xs12 md6">
                                                <div class="image responsive-img">

                                                </div>

                                            </div>
                                            
                                    

                                        </div>



                                    </div> -->
                              
                            <!-- </div>
                            
                            
                        </div>
                    </div>
                
                </section> --> 
                
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
                    </div>
                    </div>
                    <div class="row">
                            <div class="col s12 l4 offset-l1 push-l6">
                                <img src="./assets/img/home/Group1.png" alt="" class="responsive-img materialboxed">
                            </div>
                            <div class="col s12 l6 offset-l1 pull-l5 right-align">
                                <h2 class="indigo-text text-darken-4">Triage claims instantly</h2>
                                <p>Immediate damage assessments means accelerated triage from first notice of loss - no total losses sent to the bodyshops, and a faster cycle for the policyholder.</p>
                            </div>      
                    </div>
                    <div class="row">
                            <div class="col s12 l4">
                                <img src="./assets/img/home/introduction.svg" alt="" class="responsive-img materialboxed">
                            </div>
                            
                            <div class="col s12 l6 offset-l1">
                                <h2 class="indigo-text text-darken-4">Helpful</h2>
                                <p>Always willing to provide best service for keep our clients happy.</p>
                            </div>
                    </div>
                </section>

            <section class="section container scrollspy" id="services">

                <div class="row">
                         <div class="col s12 l4">
                            <h2 class="indigo-text text-darken-4">What we do..</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum at lacus congue, suscipit elit nec, tincidunt orci.</p>
                            <p>Mauris dolor augue, vulputate in pharetra ac, facilisis nec libero. Fusce condimentum gravida urna, vitae scelerisque erat ornare nec.</p>
                        </div>
                </div>

                <div class="col s12 l6 offset-l2">
                  <!-- tabs -->
                <ul class="tabs">
                <li class="tab col s6">
                    <a href="#photography" class="active indigo-text text-darken-4">Machine Learning</a>
                </li>
                <li class="tab col s6">
                    <a href="#editing" class="indigo-text text-darken-4">Generate Cost</a>
                </li>
                </ul>

                <div id="photography" class="col s12">
                    <p class="flow-text indigo-text text-darken-4">Machine Learning</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum at lacus congue, suscipit elit nec, tincidunt orci.</p>
                    <p>Mauris dolor augue, vulputate in pharetra ac, facilisis nec libero. Fusce condimentum gravida urna, vitae scelerisque erat ornare nec.</p>
                </div>

                <div id="editing" class="col s12">
                    <p class="flow-text indigo-text text-darken-4">Generate Cost</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum at lacus congue, suscipit elit nec, tincidunt orci.</p>
                    <p>Mauris dolor augue, vulputate in pharetra ac, facilisis nec libero. Fusce condimentum gravida urna, vitae scelerisque erat ornare nec.</p>
                </div>
            </div>
            </section>

            

                <div class="container">
                   
                                <Card/>
                                 <Parallax/>
                </div>

                 <!-- parallax -->
                

                <!-- contact form -->
                    <section class="section container scrollspy" id="contact">
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
                    </section>

                     <!-- <footer class="page-footer grey darken-3">

                         <div class="container">
                             <div class="row">
                                <div class="col l6 s12">
                                    <h5>About Me</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum at lacus congue.</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum at lacus congue, suscipit elit nec, tincidunt orci.</p>
                                </div>

                                <div class="col l4 offset-l2 s12">
                                    <h5 class="white-text">Connect</h5>
                                    <ul>
                                        <li><a class="grey-text text-lighten-3" href="#">Facebook</a></li>
                                        <li><a class="grey-text text-lighten-3" href="#">Twitter</a></li>
                                        <li><a class="grey-text text-lighten-3" href="#">Linked In</a></li>
                                        <li><a class="grey-text text-lighten-3" href="#">Instagram</a></li>
                                    </ul>
                                </div>
                             </div>

                             
                         </div>

                              
                     </footer> -->

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

export default {
     
    components:{Parallax,Footer,Navbar,Card,shopWrapper,garageWrapper,sparePrtWrapper,carousel},

   
}
</script>


 