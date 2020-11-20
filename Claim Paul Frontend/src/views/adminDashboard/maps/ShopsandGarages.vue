<template>
<div>
        <v-container style="position:relative;z-index:1;">
            
            <v-row>
                <v-col cols="12" sm="8" md="8">
                   <v-alert color="red lighten-2"dark v-show="error">{{error}}
                </v-alert>
                </v-col>
                <v-col cols="12" sm="8" md="8">
                <v-text-field      
                label="Solo"
                append-icon="mdi-map-marker" 
                placeholder="Enter Your Location"
                solo @click:append="locationPressed" v-model="address" ref="autocomplete" id="autocomplete"
               > 
            </v-text-field>
                </v-col>
            <v-col cols="12" sm="4" md="4">
                   <v-btn
                   
              color="success"
              dark
              class="mb-1" @click="findCloseByPressed">
              Find Close By
            </v-btn>
                </v-col>
                <v-col cols="12" sm="4" md="4">
                  <v-select :items="itemtype" v-model="type" solo label="Type:">
                      </v-select>
                </v-col>
                <v-col cols="12" sm="4" md="4">
                   <v-select :items="itemrange" v-model="range" solo label="Range:">
                      </v-select>
                </v-col>
                <v-col cols="12" sm="4" md="4">
                   <div class="item" v-for="place in places" :key="place.id">
                       <div>
                           <div>{{place.name}}</div>
                           <div>{{place.vicinity}}</div>
                       </div>
                   </div>
                </v-col>
            </v-row>
        </v-container>
        <v-container id="map">
        </v-container>
</div>
  
</template>
<script>
import Axios from 'axios';
export default {
    name:'Map',
    data()
    {
        return{
            map:null,
            address:"",
            error:"",
            itemtype:['shops','Garages'],
            itemrange:['5','10','15','20'],
            lat:0,
            lng:0,
            range:"",
            type:"",
            places:[],
        }
    },
    methods:
    {
            findCloseByPressed()
             {
        //         const URL = `https://cors-anywhere.herokuapp.com/https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=${
        //  this.lat},${this.lng}&type=${this.type}&radius=${this.range *1000}&key=AIzaSyBnPFIcqWQPAzFyJi04UW6_r-4sQuHqwDs`;
        const URL = `https://cors-anywhere.herokuapp.com/https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=${
        this.lat
      },${this.lng}&type=${this.type}&radius=${this.range *
        1000}&key=AIzaSyBnPFIcqWQPAzFyJi04UW6_r-4sQuHqwDs`;
         Axios.get(URL).then(response=>{
             this.places=response.data.results;
             console.log(response.data);
             this.addLocationToGoogleMaps();
         }).catch(error=>{
             console.log(error.message);
         });
             },
             addLocationToGoogleMaps()
             {
                 var map=new google.maps.Map(document.getElementById("map"),
                {
                    zoom:15,
                    center:new google.maps.LatLng(this.lat,this.lng),
                    mapTypeId:google.maps.MapTypeId.ROADMAP
                    
                    
                });
             },
            locationPressed()
            {
                if(navigator.geolocation)
                {
                    navigator.geolocation.getCurrentPosition(position=>
                    {
                        this.getAddressFrom(position.coords.latitude,position.coords.longitude);
                        this.showUserLocationOnTheMap(position.coords.latitude,position.coords.longitude);

                    },
                    error=>
                    {
                        this.error="Locator unable to find your address Please type your address manually";
                        console.log(error.message);
                    }

                    );
                }
                else
                {
                    this.error=error.message;
                    console.log("Browser does not support geo location api");
                }
            },
            getAddressFrom(lat,lang)
            {
                Axios.get("https://maps.googleapis.com/maps/api/geocode/json?latlng=" 
                + lat
                + ","
                + lang + "&key=AIzaSyBnPFIcqWQPAzFyJi04UW6_r-4sQuHqwDs").then(response=>
                {
                    if(response.data.error_message)
                    {
                        this.error=response.data.error_message;
                        console.log(response.data.error_message);
                    }
                    else
                    {
                        this.address=response.data.results[0].formatted_address;
                    }
                }).catch(error=>{
                    this.error=error.message;
                    console.log(error.message);
                }

                )
                
                
            },
            showUserLocationOnTheMap(latitude,longitude)
            {
                //create map object 
                let map=new google.maps.Map(document.getElementById("map"),
                {
                    zoom:15,
                    center:new google.maps.LatLng(latitude,longitude),
                    mapTypeId:google.maps.MapTypeId.ROADMAP
                    
                    
                });
                //add user location marker
                new google.maps.Marker(
                    {
                        position:new google.maps.LatLng(latitude,longitude),
                        map:map
                    }
                )
            },
    
          setMarker(Points,Label)
          {
              const markers=new google.maps.Marker({
                  position:Points,
                  map:this.map,
                  Label:{
                      text:Label,
                      color:'#FFF',
                  }
              });
          }


    },
    mounted()
    {
        let autocomplete=new google.maps.places.Autocomplete(
            document.getElementById("autocomplete"),
            {
                bounds:new google.maps.LatLngBounds(
                new google.maps.LatLng(7.873054, 80.771797),
                )
            });
            autocomplete.addListener("place_changed",()=>{
                let place=autocomplete.getPlace();
                console.log(place);
                this.showUserLocationOnTheMap(place.geometry.location.lat(),place.geometry.location.lng());
            })
       
    },
}
</script>
<style>
 #map
 {
     height: 600px;
 }
 
 .pac-item
 {
     cursor: pointer;
     font-size:16px;
     padding-left: 10px;
 }
 .pac-item:hover
 {
     background-color: #ececec;
 }
 .pac-item-query
 {
     font-size:16px;
 }
 #viewmap
 {
     position: absolute;
     background: rgb(0, 102, 255);
     top: 0;
     bottom: 0;
     left: 0;
     right: 0;
 }
 
</style>
