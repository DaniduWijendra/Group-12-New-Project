<template>


<v-app>

	<Navbar/>
  <!-- carousel -->
  <v-card>
    
    <v-carousel
      :continuous="true"
      :cycle="cycle"
      :show-arrows="false"
      hide-delimiter-background
      delimiter-icon="mdi-circle"
      height="auto"
     
    >
      <v-carousel-item
        v-for="(slide, i) in slides"
        :key="i"
        :src="slide.icon"
      >
        <!-- <v-sheet
          :color="colors[i]"
          height="100%"
          tile
        > -->
          <!-- <v-row
            class="fill-height"
            align="center"
            justify="center"
          >
            <div class="display-3 mx-3">
              {{ slide }} Slide
            </div>
          </v-row> -->
        <!-- </v-sheet> -->
      </v-carousel-item>
    </v-carousel>
   
  </v-card>

  <v-card
  class="indigo lighten-2"
  height="200px">

  </v-card>
  <!-- sidebar -->
<v-row>
  <v-col cols="12" sm="2">
<div id='sidebar'>
    <v-navigation-drawer class='indigo lighten-4' permanent>
      <v-list-item>
        <v-list-item-content>
          <v-list-item-title class="title">
            Application
          </v-list-item-title>
          <v-list-item-subtitle>
            subtext
          </v-list-item-subtitle>
        </v-list-item-content>
      </v-list-item>

      <v-divider></v-divider>

      <v-list
        dense
        nav
      >
        <v-list-item
          v-for="item in items"
          :key="item.title"
          link
          :to='item.path'
        >
          <v-list-item-icon>
            <v-icon>{{ item.icon }}</v-icon>
          </v-list-item-icon>

          <v-list-item-content>
            <v-list-item-title>{{ item.title }}</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>
  </div>
  </v-col>
  <!-- cards -->
  <v-col cols="12" sm="8">
    <v-row>
    <v-col
      v-for="n in images"
      :key="images.icon"
      class="d-flex child-flex"
      cols="4"
    >
      <v-img
        :src="n.icon"
        
        aspect-ratio="1"
        class="grey lighten-2"
      >
        <template v-slot:placeholder>
          <v-row
            class="fill-height ma-0"
            align="center"
            justify="center"
          >
            <v-progress-circular
              indeterminate
              color="grey lighten-5"
            ></v-progress-circular>
          </v-row>
        </template>
      </v-img>
    </v-col>
  </v-row>
  </v-col> 
</v-row>      
</div>

</v-card>


</v-app>

</template>


<script>
    
    import Navbar from './navbar'
    import sparePrt from './Home/spareParts'
    import shop from './Home/shops'
    import garage from './Home/garages'
  export default {

      components:{Navbar,sparePrt,shop,garage},

     data () {
      return {
         cards: [
        { title: 'Pre-fab homes', src: 'https://cdn.vuetifyjs.com/images/cards/house.jpg', flex: 12 },
        { title: 'Favorite road trips', src: 'https://cdn.vuetifyjs.com/images/cards/road.jpg', flex: 6 },
        { title: 'Best airlines', src: 'https://cdn.vuetifyjs.com/images/cards/plane.jpg', flex: 6 },
      ],
      images:[
       {icon:require('@/assets/img/home/customerservice.jpg')},
       {icon:require('@/assets/img/home/faq.png')},
       {icon:require('@/assets/img/home/faq.png')},
       {icon:require('@/assets/img/home/faq.png')},
       {icon:require('@/assets/img/home/faq.png')},
       {icon:require('@/assets/img/home/faq.png')},
       {icon:require('@/assets/img/home/faq.png')},
       {icon:require('@/assets/img/home/faq.png')},
       {icon:require('@/assets/img/home/faq.png')}
      ],
        colors: [
          'indigo lighten-1',
          'indigo darken-1',
          'indigo darken-2',
          'indigo darken-3',
          'indigo darken-4',
        ],
        cycle: true,
        slides: [
          {
            icon:require('@/assets/img/home/servicefirst.png'),
            
          },
          {
            icon:require('@/assets/img/home/servicesecond.png'),
          },
          {
            icon:require('@/assets/img/home/servicethird.png'),
          },
        ],

         items: [
          { title: 'Garage', icon: 'mdi-hammer-wrench' ,path:'/garages'},
          { title: 'Shops', icon: 'mdi-store-24-hour' ,path:'/shops'},
          { title: 'Spare parts', icon: 'mdi-puzzle-plus' ,path:'/spare_parts'},
        ],
        right: null,

       
      }
    },

    

 }  
     

</script>


<style scoped>


#grid{	

	position: absolute;
	left: 320px;
	height: 1200px;
	top:0;
}
#sidebar{
	float:left;
	background:#d0d0e5;
	max-width:200px;	
  padding:10px 0 0 0px;
  margin-top:0;
	height:900px;

}



 


</style>