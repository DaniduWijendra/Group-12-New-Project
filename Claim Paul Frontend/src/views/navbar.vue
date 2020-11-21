<template>
     <div>
                    <nav class="nav-wrapper  navi-bar">
                    <div class="container">
                        <a href="#" class="logo display-4"> Claim Paul </a>
                        <a href="#" class="sidenav-trigger" >
                        <i class="material-icons">menu</i>
                        </a>
                        <ul class="right hide-on-med-and-down">
                        <li><router-link :to="{name:'Home'}">Home</router-link></li>
                        <li><router-link :to="{name:'About'}">About us</router-link></li>
                        <li><router-link :to="{name:'Contact'}">contact</router-link></li>
                        <li><router-link :to="{name:'Services'}">Services</router-link></li>
                        <li><router-link :to="{name:'Faq'}">FAQ</router-link></li>
                        <li><router-link :to="{name:'login'}">Login</router-link></li>
                        <li><router-link :to="{name:'policy holder register'}">Register</router-link></li>
                        
                       
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