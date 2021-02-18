<template>
<v-container
    id="dashboard"
    fluid
    tag="section"
>
 <base-material-card
 color="success"
 icon="mdi-text-box-multiple-outline"
 title="Vehicles "
 class=" px-5 py-3"
 >
  <v-data-table
 :headers="headers"
 :items="items"
 :search="search" 
 sort-by="vId"
 class="elevation-1"
  >

     
    <template v-slot:top>
      <v-toolbar
        flat
      >
        <v-toolbar-title>Vehicle Table</v-toolbar-title>
        <v-divider
          class="mx-4"
          inset
          vertical
        ></v-divider>
        <v-spacer></v-spacer>
        <v-dialog
          v-model="dialog"
          max-width="1000px"
        >
          <template v-slot:activator="{ on, attrs }">
            
            

            <v-btn
              color="primary"
              dark
              class="mb-2"
              v-bind="attrs"
              v-on="on"
            >
              +New Item
            </v-btn>
               <v-menu
          rounded="rounded"
          offset-y
      >
      <template v-slot:activator="{ attrs, on }">
        <v-btn
          color="red"
          v-bind="attrs"
          v-on="on"
          :loading="loading"
          @click="loader = 'loading'"
        >
            <v-icon color="white">mdi-filter</v-icon>
        </v-btn>
      </template>

      <v-list>
        <v-list-item>
          <v-list-item-title class="mx-2" >
              <v-btn @click="searchById" rounded color="blue darken-3" >Id</v-btn>
              <!-- <v-btn @click="searchByVehicleNumber" rounded color="blue darken-3">Vehicle Number</v-btn> -->
              <!-- <v-btn @click="searchByPolicy" rounded color="blue darken-3">Policy Id</v-btn> -->
              <v-btn @click="searchByType" rounded color="blue darken-3">Type</v-btn>
              
              <v-btn @click="searchByDate" rounded color="blue darken-3">Date</v-btn><br><br>
              <!-- <v-btn @click="searchByInsurance" rounded color="blue darken-3">Insurance Type</v-btn> -->
              <v-btn @click="searchByPolicyPid" rounded color="blue darken-3">Policy Pid</v-btn>
              
          </v-list-item-title>
          
         

        </v-list-item>
      </v-list>
    </v-menu>
             <v-text-field
                  v-model="search"
                  append-icon="mdi-magnify"
                  single-line
                  hide-details
                  placeholder="Search"
                  class="col-md-4 pr-4"
            ></v-text-field>
          </template>
          <v-card>
            <v-card-title>
              <span class="headline">{{ formTitle }}</span>
             
                <v-icon large class="float-right" @click="dialog = false">mdi-close-circle-outline</v-icon>
                 
            </v-card-title>

            <v-card-text>
              <v-container>
                          
                <v-form
                ref="form"
                v-model="valid"
                lazy-validation
              >
                    <v-text-field
                    v-model="editedItem.vehicleNumber"
                    :rules="nameRules"
                    label="Vehicle Number:"
                    required
                    ></v-text-field>

                    
                    <v-text-field
                    v-model="editedItem.policyId"
                    :rules="nameRules"
                    label="Policy Id:"
                    required @keydown="nameKeydown($event)"
                    ></v-text-field>

                  <v-menu
                      ref="menu"
                      v-model="menu"
                      :close-on-content-click="false"
                      :return-value.sync="editedItem.insuranceDate"
                      transition="scale-transition"
                      offset-y
                      min-width="290px"
                    >
                      <template v-slot:activator="{ on, attrs }">
                        <v-text-field
                          v-model="editedItem.insuranceDate"
                          label="Picker in menu"
                          prepend-icon="mdi-calendar"
                          readonly
                          v-bind="attrs"
                          v-on="on"
                        ></v-text-field>
                      </template>
                      <v-date-picker
                        v-model="editedItem.insuranceDate"
                        no-title
                        scrollable
                      >
                        <v-spacer></v-spacer>
                        <v-btn
                          text
                          color="primary"
                          @click="menu = false"
                        >
                          Cancel
                        </v-btn>
                        <v-btn
                          text
                          color="primary"
                          @click="$refs.menu.save(editedItem.insuranceDate)"
                        >
                          OK
                        </v-btn>
                      </v-date-picker>
                    </v-menu>
                  <v-row>
                    <v-col col="12" sm="6" >
                      <v-select v-model="editedItem.type" :rules="nameRules" :items="vehicleType" label="Vehicle Type:">
                      </v-select>
                
                    </v-col>
                  
                      <v-col col="12" sm="6" >
                                <v-text-field
                                v-model="editedItem.color"
                                :rules="nameRules"
                                label="Vehicle Color:"
                                required @keydown="nameKeydown($event)"
                                ></v-text-field>
                      </v-col>

                      <v-col col="12" sm="6" >
                                <v-text-field
                                v-model="editedItem.model"
                                :rules="nameRules"
                                label="Vehicle Model:"
                                required 
                                ></v-text-field>
                              
                              </div>
                      </v-col>

                      <v-col col="12" sm="6" >
                                <v-text-field
                                v-model="editedItem.year"
                                :rules="nameRules"
                                label="Year:" maxlength="4"
                                required @keypress="isNumber($event)"
                                ></v-text-field>
                      </v-col>
            </v-row>

            <v-row>
                    <v-col col="12" sm="4" >
                              <v-text-field
                              v-model="editedItem.valuation"
                              :rules="nameRules"
                              label="Vehicle Valuation(Rs):"
                              required @keypress="isNumberWithDot($event)"
                              ></v-text-field>
                    </v-col>

                    <v-col col="12" sm="4" >
                              <v-text-field
                              v-model="editedItem.policyPid"
                              :rules="nameRules"
                              label="Policy Pid:"
                              required @keypress="isNumber($event)"
                              ></v-text-field>
                            
                            </div>
                    </v-col>

                    <v-col col="12" sm="4" >
                              <v-text-field
                              v-model="editedItem.garageGid"
                              :rules="nameRules"
                              label="GarageId:"
                              required @keypress="isNumber($event)"
                              ></v-text-field>
                    </v-col>
          </v-row>

          <v-row>

            <v-col col="12" sm="6">
              <v-select v-model="editedItem.insuranceType" :rules="nameRules" :items="insType" label="Insurance Type:" required>
              </v-select>
            </v-col>

            <v-col col="12" sm="6">
                <div class="dropbox">
                    <input type="file"class="input-file" name='image' @change="getImage($event)">
                        <p>
                          Drag your file(s) here to begin<br> or click to browse
                        </p>

                    </div>
            </v-col>

            

          </v-row>

                  
          <v-card-actions>
            <v-spacer></v-spacer>
          
            <v-btn v-if="formTitle=='Add New Vehicle'"
              type="submit"
              :disabled="!valid"
              color="primary"
              text
              @click="save"
            
            >
              Submit
            </v-btn>

            <v-btn v-if="formTitle=='Edit Vehicle'"
              type="submit"
              :disabled="!valid"
              color="warning"
              text
              @click="save"
            
            >
              Update
            </v-btn>

            <v-btn
              color="blue darken-1"
              text
              @click="clear"
            >
              Clear
            </v-btn>
          </v-card-actions>

            </v-form>
          </v-container>
                                                       
            </v-card-text>

        
          </v-card>
        </v-dialog>

        <v-dialog v-model="dialogDelete" max-width="1000px">
          <v-card>
            <v-card-title class="headline">Are you sure you want to delete this item?</v-card-title>
            <v-card-actions>
              <v-spacer></v-spacer>
              <v-btn color="blue darken-1" text @click="closeDelete">Cancel</v-btn>
              <v-btn color="blue darken-1" text @click="deleteItemConfirm">OK</v-btn>
              <v-spacer></v-spacer>
            </v-card-actions>
          </v-card>
        </v-dialog>

        <v-dialog v-model="dialogView" max-width="1000px">
          <v-card>
           
              <img v-bind:src="'http://hms.ruh.ac.lk/images/'+images.image" style="width:1000px;height:500px" alt="">
          </v-card>
        </v-dialog>

      </v-toolbar>
    </template>
    <template v-slot:item.actions="{ item }">
      <v-btn
        small
        color="blue"
        class="mr-2"
        
        @click="editItem(item)"
      >
        <v-icon>mdi-pencil</v-icon> 
      </v-btn>
      <v-btn
        color="red"
        small
        @click="deleteItem(item)"
      >
        <v-icon>mdi-delete</v-icon>
      </v-btn>
      <v-btn
      class="mx-2"
      fab
      outlined
      small
      color="green"
      v-bind:key=''
      @click="viewImage(item)"
      v-bind:id='item.vId'
    >
      <v-icon>
        mdi-google-photos
      </v-icon>
    </v-btn>
    </template>
   
  </v-data-table>
  </base-material-card>


  </v-container>
</template>




<script>

 import Axios from '../../../baseURL'

  export default {
    
    data:()=>({
      
      items:[],
      search:'',
      dialog: false,
      loading:false,
      loader:null,
      dialogDelete: false,
      dialogView:false,
      editedIndex: -1,
      menu:'',
      vehicleType:[
        'Car',
        'Van',
        'Motor Coach',
        'Bus',
        'Truck',
        'Heavy Vehicle'
      ],
      insType:[
        'Third Party',
        'Full Option'
      ],
      images:[],
        headers: [
        {
          text: 'Vehicle Id',
          align: 'start',
          value: 'vId',
          sortable: true
        },
        { text: 'Vehicle Number', value: 'vehicleNumber',sortable: false  },
        { text: 'Policy Id', value: 'policyId' },
        { text: 'Vehicle Type', value: 'type' ,sortable: false },
        { text: 'Vehicle Model', value: 'model',sortable: false  },
        { text: 'Vehicle Color', value: 'color',sortable: false  },
        { text: 'year', value: 'year',sortable: true},
        { text: 'Insurance Date', value: 'insuranceDate',sortable: true},
        { text: 'Valuation', value: 'valuation' },
        { text: 'Insurance Type', value: 'insuranceType',sortable: true},
        { text: 'Policy Pid', value: 'policyPid' ,sortable: true},
        { text: 'Garage Id', value: 'garageGid',sortable: false},
        { text: 'Image', value: 'image',sortable: false  },
        { text: 'Actions', value: 'actions', sortable: false },
      ],

      editedItem:{
        vehicleNumber:'',
        policyId:'',
        type:'',
        model:'',
        color:'',
        year:'',
        insuranceDate:'',
        valuation:'',
        insuranceType:'',
        policyPid:'',
        garageGid:'',
        image:'',
        
      },

       defaultItem:{
        vehicleNumber:'',
        policyId:'',
        type:'',
        model:'',
        color:'',
        year:'',
        insuranceDate:'',
        valuation:'',
        insuranceType:'',
        policyPid:'',
        garageGid:'',
        image:'',
        
      },

       nameRules: [v => !!v || '*this field is required',],
        valid: true,
    }),

    computed: {
      formTitle () {
        return this.editedIndex === -1 ? 'Add New Vehicle' : 'Edit Vehicle'
      },
    },

   
    methods: {
       nameKeydown(e) {
      if (/^\W$/.test(e.key)) {
        e.preventDefault();
      }
    },
    isNumber: function(evt) {
      evt = (evt) ? evt : window.event;
      var charCode = (evt.which) ? evt.which : evt.keyCode;
      if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        evt.preventDefault();;
      } else {
        return true;
      }
    },
    isNumberWithDot: function(evt) {
      evt = (evt) ? evt : window.event;
      var charCode = (evt.which) ? evt.which : evt.keyCode;
      if ((charCode > 31 && (charCode < 48 || charCode > 57)) && charCode !== 46) {
        evt.preventDefault();;
      } else {
        return true;
      }
    },
      

      submit()
      {
          this.$refs.form.validate()

          Axios.post('add_vehicle',{
            
               vehicleNumber: this.editedItem.vehicleNumber,
               policyId: this.editedItem.policyId,
               type: this.editedItem.type,
               model: this.editedItem.model,
               color: this.editedItem.color,
               year: this.editedItem.year,
               insuranceDate: this.editedItem.insuranceDate,
               valuation: this.editedItem.valuation,
               insuranceType: this.editedItem.insuranceType,
               policyPid: this.editedItem.policyPid,
               garageGid: this.editedItem.garageGid,
               image: this.editedItem.image,
            
          }).then(Response=>{
        
          console.log(Response.data);
          this.s('New Report is added successfully');
    
        }).catch(function(error){
          console.log(error);
        
        })
        this.clear();

        this.close();
        
          
      },

      getImage(e)
      {
        var fileReader=new FileReader();

        fileReader.readAsDataURL(e.target.files[0]);

        fileReader.onload=(e)=>{

            this.editedItem.image=e.target.result;
        };

        console.log(this.editedItem.image);
      },

       clear()
      {
          this.editedItem.vehicleNumber= '',
          this.editedItem.policyId='',
          this.editedItem.type='',
          this.editedItem.model='',
          this.editedItem.color='',
          this.editedItem.year='',
          this.editedItem.insuranceDate='',
          this.editedItem.valuation='',
          this.editedItem.insuranceType='',
          this.editedItem.policyPid='',
          this.editedItem.garageGid='',
          this.editedItem.image=null
      },

      
      editItem (item) {
        this.editedIndex = this.items.indexOf(item)
        this.editedItem = Object.assign({}, item)
        this.dialog = true

        //console.log(this.editedItem);

        

        
      },

       updateItem()
      {
        

         Axios.put('edit_vehicle/'+this.editedItem.vId,this.editedItem).then(Response=>{
          
                    this.s('vehicle is successfully updated');
          }).catch(function(error){
          console.log(error);
          
        })
        

      },

      viewImage(item)
      {

         Axios.get('get_image/'+item.vId).then(Response=>{

          this.images=Response.data.vehicle[0];
          
          
            this.s("success")})
            .catch(function(error){
          
              console.log(error);
            
            })
            console.log( this.images);
          
          
  
            this.dialogView = true;
      },

      deleteItem (item) {
        this.editedIndex = this.items.indexOf(item)
        this.editedItem = Object.assign({}, item)
        this.dialogDelete = true

        
      },

       deleteItemConfirm () {
        this.items.splice(this.editedIndex, 1)
        this.closeDelete()

         Axios.put('delete_vehicle/'+this.editedItem.vId,this.editedItem).then(Response=>{
                this.s('vehicle is successfully deleted');
          }).catch(function(error){
          console.log(error);
        
        })
      },
      searchById(){
          this.loading=true;
          Axios.get('filter_vehicle_id/'+this.search).then(Response=>{
                    this.items=Response.data;
                    console.log(Response.data);
                    this.loading=false;
                  }).catch(error=>{
                    console.log(error);
                  });

          
      },
      
      searchByType(){
        Axios.get('filter_vehicle_type/'+this.search).then(Response=>{
                    this.items=Response.data;
                    console.log(Response.data);
                  }).catch(error=>{
                    console.log(error);
                  });
      },
      searchByDate(){
        Axios.get('filter_vehicle_date/'+this.search).then(Response=>{
                    this.items=Response.data;
                    console.log(Response.data);
                  }).catch(error=>{
                    console.log(error);
                  });
      },
      // searchByInsurance(){
      //   Axios.get('filter_vehicle_insurance/'+this.search).then(Response=>{
      //               this.items=Response.data;
      //               console.log(Response.data);
      //             }).catch(error=>{
      //               console.log(error);
      //             });
      // },
       searchByPolicyPid(){
        Axios.get('filter_vehicle_policypid/'+this.search).then(Response=>{
                    this.items=Response.data;
                    console.log(Response.data);
                  }).catch(error=>{
                    console.log(error);
                  });
      },
      
      
      
      

      close () {
        this.dialog = false
        this.$nextTick(() => {
          this.editedItem = Object.assign({}, this.defaultItem)
          this.editedIndex = -1
        })
      },

       closeDelete () {
        this.dialogDelete = false
        this.$nextTick(() => {
          this.editedItem = Object.assign({}, this.defaultItem)
          this.editedIndex = -1
        })
      },

       save () {
        if (this.editedIndex > -1) {
          this.updateItem();
        } else {
          this.submit();}
        this.close();
      },
    },

     watch: {
      dialog (val) {
        val || this.close()
      },
      dialogDelete (val) {
        val || this.closeDelete()
      },
      loader () {
        const l = this.loader
        this[l] = !this[l]

        setTimeout(() => (this[l] = false), 3000)

        this.loader = null
      },
    },
    

    created(){
    
      
    Axios.get('get_vehicle').then(Response=>{
          this.items=Response.data;
          console.log(Response.data);
          //console.log(this.items);
        }).catch(function(error){
          console.log(error);
        })
        
      
    },
  }

</script>

<!-- SASS styling -->
<style>
  .dropbox {
    outline: 2px dashed grey; /* the dash box */
    outline-offset: -10px;
    background: lightcyan;
    color: dimgray;
    padding: 10px 10px;
    min-height: 200px; /* minimum height */
    position: relative;
    cursor: pointer;
  }

  .input-file {
    opacity: 0; /* invisible but it's there! */
    width: 100%;
    height: 200px;
    position: absolute;
    cursor: pointer;
  }

  .dropbox:hover {
    background: lightblue; /* when mouse over to the drop zone, change color */
  }

  .dropbox p {
    font-size: 1.2em;
    text-align: center;
    padding: 50px 0;
  }
</style>