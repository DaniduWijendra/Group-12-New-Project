<template>
<div>
    <v-app-bar
      color="deep-purple darken-4"
      dark
      class="navi-bar"
    >
      <v-icon @click="drawer = true" class="mx-2">mdi-menu</v-icon>
      <v-toolbar-title class="d-none d-sm-block">
      <span class="logo display-3 "> ClaimPaul. </span>
      </v-toolbar-title>

      <v-spacer></v-spacer>
      
            <!-- <v-text-field
            append-icon="mdi-microphone"
            class="mx-2 shrink"
            flat
            hide-details
            label="Search"
            prepend-inner-icon="mdi-magnify"
            solo-inverted
            
          ></v-text-field> -->
          
     
    <!-- notification -->
    <div class="text-center">
    <v-menu
      open-on-hover
      bottom
      offset-y
    >
      <template v-slot:activator="{ on, attrs }">
        <v-btn
          color="deep-purple darken-4"
          dark
          v-bind="attrs"
          v-on="on"
        >
          <v-icon>mdi-bell-outline</v-icon>
        </v-btn>
      </template>

      <v-list>
        <v-list-item
          v-for="(language, index) in languages"
          :key="index"
        >
          <v-list-item-title>{{ language.title }}</v-list-item-title>
        </v-list-item>
      </v-list>
    </v-menu>
  </div>
    <!-- language -->
    <div class="text-center">
    <v-menu
      open-on-hover
      bottom
      offset-y
    >
      <template v-slot:activator="{ on, attrs }">
        <v-btn
          color="deep-purple darken-4"
          dark
          v-bind="attrs"
          v-on="on"
        >
          <v-icon>mdi-translate</v-icon>
        </v-btn>
      </template>

      <v-list>
        <v-list-item
          v-for="(language, index) in languages"
          :key="index"
        >
          <v-list-item-title>{{ language.title }}</v-list-item-title>
        </v-list-item>
      </v-list>
    </v-menu>
  </div>

   <!-- account -->
    <div class="text-center mx-2">
    <v-menu
      open-on-hover
      bottom
      offset-y
    >
      <template v-slot:activator="{ on, attrs }">
        <v-btn
          color="deep-purple darken-4"
          dark
          fab
          small
          v-bind="attrs"
          v-on="on"
        >
          <v-icon>mdi-account-outline</v-icon>
        </v-btn>
      </template>

      <v-list>
        <v-list-item
          v-for="(language, index) in languages"
          :key="index"
        >
          <v-list-item-title>{{ language.title }}</v-list-item-title>
        </v-list-item>
      </v-list>
    </v-menu>
  </div>

    
    </v-app-bar>

   <v-navigation-drawer
    v-model="drawer"
    :expand-on-hover="expandOnHover"
    width="260"
    absolute
    temporary
    color="indigo lighten-5"
  >
    

    <v-divider class="mb-1" />

    <v-list
      dense
      nav
    >
      <v-list-item class='mx-'>
        <v-list-item-avatar
          class="mx-4"
          color="blue"
          contain
          size="150"
        >
          <!-- <v-avatar size="120"> -->
            <img src='../assets/img/home/logo.png'></img>
        
          <!-- </v-avatar> -->
        </v-list-item-avatar>

      
      </v-list-item>
      <v-list-item link>
          <v-list-item-content>
            <v-list-item-title class="title" >
              Claim Paul Insuarance
            </v-list-item-title>
            <v-list-item-subtitle><span>Email:claimpaul1@gmail.com</span></v-list-item-subtitle>
            <v-list-item-subtitle><span>Hot Line:(+94)444444444</span></v-list-item-subtitle>
          </v-list-item-content>

          
        </v-list-item>
    </v-list>

    <v-divider class="mb-2" />

    <v-list
      expand
      nav
      rounded
      color="white"
      class="mx-3"
    >
     
      <div />

      <template v-for="(item, i) in computedItems">
        <base-item-group
          v-if="item.children"
          :key="`group-${i}`"
          :item="item"
           color="primary"
           
        >
          
        </base-item-group>

        <base-item
          v-else
          :key="`item-${i}`"
          :item="item"
      
        />
      
      </template>

      <div />
    </v-list>

  </v-navigation-drawer>
    </div>
</template>




<script>

  import {
    mapState,
  } from 'vuex'

  export default {
    

    props: {
      expandOnHover: {
        type: Boolean,
        default: false,
      },
    },

    data: () => ({
      user:null,
      drawer:false,
      items: [
        {
          icon: 'mdi-home',
          title: 'Home',
          to: '/',
        },

         {
          icon: 'mdi-information-outline',
          title: 'About',
          to: '/about',
        },
         {
          icon: 'mdi-contacts',
          title: 'Contact Us',
          to: '/contact',
        },

         {
          icon: 'mdi-toolbox-outline',
          title: 'Services',
          to: '/services',
        },

        {
          icon: 'mdi-frequently-asked-questions',
          title: 'FAQ',
          to: '/faq',
        },

        {
          icon: 'mdi-login-variant',
          title: 'login',
          to: '/login',
        },

         {
          icon: 'mdi-account-plus-outline',
          title: 'Register',
          to: '/policyholder_register',
        },

      ],

      languages: [
        { title: 'Click Me' },
        { title: 'Click Me' },
        { title: 'Click Me' },
        { title: 'Click Me 2' },
      ],
    }),

    computed: {
      
     
      computedItems () {
        return this.items.map(this.mapItem)
      },
      profile () {
        return {
          avatar: true,
          title: this.$t('avatar'),
        }
      },
    },

    methods: {
      mapItem (item) {
        return {
          ...item,
          children: item.children ? item.children.map(this.mapItem) : undefined,
          title: this.$t(item.title),
        }
      },
    },

   
  }
</script>

<style >
  @import '../css/navbar.css';
  @import url('https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap');
  

  
</style>


