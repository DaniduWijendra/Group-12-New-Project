<template>

<div>
   <Navbar/> 
  <h2 class="center blue-text text-darken-4">Spare Part Shops</h2>
   <v-layout row wrap>
      <div class="item col-xs-12 col-sm-6 col-md-4 col-lg-4" v-for="item in items" :key="item.shpId">
   <v-card
    class="mx-auto my-12"
    max-width="374"
  >
    <template slot="progress">
      <v-progress-linear
        color="deep-purple"
        height="10"
        indeterminate
      ></v-progress-linear>
    </template>

    <v-img
      height="250"
      v-bind:src="'http://127.0.0.1:8000/images/'+item.image" alt="">
    </v-img>

    <v-card-title>{{item.sName}}</v-card-title>

    <v-card-text>
      <v-row
        align="center"
        class="mx-0"
      >
        <v-rating
          :value="4.5"
          color="amber"
          dense
          half-increments

          size="14"
        ></v-rating>

        <div class="grey--text ml-4">
          4.5 (413)
        </div>
      </v-row>

      <div class="my-4 subtitle-1">
        <b>Shop Information</b>
      </div>

      <div>
        Shop Address:{{item.sAddress}}<br>
        Item Contact:{{item.sContact}}<br>
        Item Location:{{item.sLocation}}
      </div>
    </v-card-text>

    <!-- <v-divider class="mx-4"></v-divider> -->

    <!-- <v-card-title>Part Price: (Rs)</v-card-title>

    <v-card-text>
    <div>{{item.price}}</div>
    </v-card-text> -->

    <v-card-actions>
      <!-- <v-btn
        color="deep-purple lighten-2"
        text
        @click="reserve"
      >
        Reserve
      </v-btn> -->
    </v-card-actions>
  </v-card>
      </div>
   </v-layout>
</div>
</template>

<script>
import Axios from '../../baseURL'
import Navbar from '../navbar'
export default {
    components:{Navbar},

    data(){

        return{
            showdetails:false,
             items:[],
        }

    },

     created(){
    
      
    Axios.get('get_shop').then(Response=>{
          this.items=Response.data;
          console.log(Response.data);
          //console.log(this.items);
        }).catch(function(error){
          console.log(error);
        })
        
      
    },
}
</script>

<style scoped>
 
    
  
</style>


