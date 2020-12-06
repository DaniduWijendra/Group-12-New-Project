<template>
    <div>
        <Navbar/>
         <section class="claimpaul-banner">
                    <div class="slider">
                        <div class="slide">
                            <div class="content-holder">
                                

                                    <div class="content">
                                        <div class="row">
                                            <div class="col12 xs12 s6">
                                                <div class="sub-content col px-md-5">

                                                    <div class="title">
                                                       <h1 class="display-1">Claim Paul</h1>
                                                    </div>

                                                    <div class="sub-title">
                                                        well come to claim Paul!!!
                                                    </div>

                                                    <div class="btn-sign-up"></div>
                                                    <div class="btn-get-started"></div>

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

                </section>

        <section>
            <h1>FAQ</h1>
        </section>
        <footer>
            <Footer/>
        </footer>
    </div>
</template>

<script>
import Navbar from './navbar'
import Footer from './footer'
export default {

    components:{Navbar,Footer},
    
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