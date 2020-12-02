<template>
<div >


	<Navbar/>

  <v-card>
    
    <v-carousel
      :continuous="true"
      :cycle="cycle"
      :show-arrows="false"
      hide-delimiter-background
      delimiter-icon="mdi-minus"
      height="610"
     
    >
      <v-carousel-item
        v-for="(slide, i) in slides"
        :key="i"
      >
        <v-sheet
          :color="colors[i]"
          height="100%"
          tile
        >
          <v-row
            class="fill-height"
            align="center"
            justify="center"
          >
            <div class="display-3 mx-3">
              {{ slide }} Slide
            </div>
          </v-row>
        </v-sheet>
      </v-carousel-item>
    </v-carousel>
   
  </v-card>

  <v-card
  class="indigo lighten-2"
  height="200px">

  </v-card>

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
<v-card>
<div id="grid">

    <div class="container">
      
               
    </div>
</div>
</v-card>        
</div>

</v-card>


</div>
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
         
        colors: [
          'indigo lighten-1',
          'indigo darken-1',
          'indigo darken-2',
          'indigo darken-3',
          'indigo darken-4',
        ],
        cycle: true,
        slides: [
          'First',
          'Second',
          'Third',
          'Fourth',
          'Fifth',
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
	width:275px;	
  padding:10px 0 0 0px;
  margin-top:0;
	height:1300px;

}



 


</style>