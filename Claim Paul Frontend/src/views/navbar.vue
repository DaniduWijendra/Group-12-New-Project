<template>
     <div>
                    <nav class="nav-wrapper  navi-bar">
                    <div class="container">
                        <img src="../assets/img/home/logomini.png" width="100px" height="100px">
                        <a href="#" class="logo display-4"> Claim Paul </a>
                        <a href="#" class="sidenav-trigger">
                        <i class="material-icons">menu</i>
                        </a>
                        <ul class="right hide-on-med-and-down">
                        <li><router-link :to="{name:'Home'}"><span class="navss-link">Home</span></router-link></li>
                        <li><router-link :to="{name:'About'}"><span class="navss-link">About us</span></router-link></li>
                        <li><router-link :to="{name:'Contact'}"><span class="navss-link">Contact</span></router-link></li>
                        <li><router-link :to="{name:'Services'}"><span class="navss-link">Services</span></router-link></li>
                        <li><router-link :to="{name:'Faq'}"><span class="navss-link">FAQ</span></router-link></li>
                        <li><router-link :to="{name:'login'}"><span class="navss-link">Login</span></router-link></li>
                        <li><router-link :to="{name:'policy holder register'}"><span class="navss-link">Register</span></router-link></li>
                        
                       
                        <li><a href="#" class="tooltipped btn-floating btn-small indigo darken-4" data-position="bottom" data-tooltip="Instagram"> 
                            <i class="fab fa-instagram"></i>
                        </a></li>
                        <li><a href="#" class="tooltipped btn-floating btn-small indigo darken-4" data-position="bottom" data-tooltip="Facebook">
                            <i class="fab fa-facebook"></i>
                        </a></li>
                        <li><a href="#" class="tooltipped btn-floating btn-small indigo darken-4" data-position="bottom" data-tooltip="Twitter">
                            <i class="fab fa-twitter"></i>
                        </a></li>
                        </ul>
                        <ul class="sidenav grey lighten-2" id="mobile-menu">
                        <li><router-link to="/">Home</router-link></li>
                        <li><router-link to="/about">About us</router-link></li>
                        <li><router-link to="/contact">contact</router-link></li>
                        <li><router-link to="/services">Services</router-link></li>
                        <li><router-link to="/faq">FAQ</router-link></li>
                        </ul>
                    </div>
                    </nav>
                </div>

</template>
<style scoped>
@import '../css/navbar.css';
@import url('https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap');

</style>