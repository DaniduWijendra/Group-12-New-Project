<template>
<div>
    <Navbar/>
    
     <div id="products" class="row view-group mx-5">
                <div class="item col-xs-4 col-lg-4" v-for="item in items">
                    <div class="thumbnail card">
                        <div class="img-event">
                            <img class="group list-group-image img-fluid" src="http://placehold.it/400x250/000/fff" alt="" />
                        </div>
                        <div class="caption card-body">
                            <h4 class="group card-title inner list-group-item-heading">{{item.sName}}</h4>
                            
                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <p class="lead">
                                        {{item.sAddress}}</p>
                                </div>
                                <div class="col-xs-12 col-md-6">
                                    <a class="btn btn-success" href="#">Add to cart</a>
                                </div>
                                   
                                       
                                       <v-expansion-panels class="mb-6">
                                            <v-expansion-panel>
                                              <v-expansion-panel-header expand-icon="mdi-menu-down">
                                                Item
                                              </v-expansion-panel-header>
                                                  <v-expansion-panel-content>
                                                   <table>
                                                     
                                                       <tr>
                                                         <td>contact</td>
                                                         <td>{{item.sContact}}</td>
                                                       </tr>

                                                       <tr>
                                                         <td>Location</td>
                                                         <td>{{item.sLocation}}</td>
                                                       </tr>

                                                
                                                     
                                                   </table>
                                                  </v-expansion-panel-content>
                                            </v-expansion-panel>
                                          </v-expansion-panels>
                                
                                      
                                </div>
                                   
                            </div>
                        </div>
                    </div>
                </div> 

    
</div>
</template>

<script>
import Axios from '../../baseURL'
import Navbar from '../navbar'
export default {
    components:{Navbar},

    data(){

        return{
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


