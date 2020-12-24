<template>
<v-container
    id="dashboard"
    fluid
    tag="section"
>
 <base-material-card
 color="success"
 icon="mdi-text-box-multiple-outline"
 title="ClaimPaul Reports"
 class=" px-5 py-3"
 >
  <v-data-table
 :headers="headers"
 :items="items" 
 :search="search"
 sort-by="rId"
 class="elevation-1"
  >

  <template v-slot:item.isAccepted="{ item }">
      <v-chip
        :color="getColor(item.isAccepted)"
        :text="getStatus(item.isAccepted)"
        dark
      >
        <!-- {{ item.isAccepted }} -->
      </v-chip>
    </template>

     
    <template v-slot:top>
      <v-toolbar
        flat
      >
        <v-toolbar-title>Report Table</v-toolbar-title>
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
            <router-link to='/agent/reportsHandle'>
            <v-btn
              color="warning"
              dark
              class="mb-2"
              >
              View Reports
            </v-btn>
            </router-link>
            <v-divider
            class="mx-4"
            inset
            vertical
            ></v-divider>

            <v-btn
              color="primary"
              dark
              class="mb-2"
              v-bind="attrs"
              v-on="on"
            >
              New Item
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
              <v-btn @click="searchById">Id</v-btn>
              <v-btn @click="searchByDescription">Report Description</v-btn>
              <v-btn @click="searchByDate">Date</v-btn>
              <v-btn @click="searchByVehicleNumber">Vehicle Number</v-btn></br><br>

              <v-btn @click="searchByAdminId">Admin Id</v-btn>
              <v-btn @click="searchByAgentId">Agent Id</v-btn>
              <v-btn @click="searchByPlace">Place</v-btn>
              <v-btn >Status</v-btn></br> 
          </v-list-item-title>
          
         

        </v-list-item>
      </v-list>
    </v-menu>

      
      <v-text-field
        v-model="search"
        class="mx-2"
        flat
        hide-details
        label="Search"
        prepend-inner-icon="mdi-magnify"
        solo-inverted
        
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
                                                                <v-textarea
                                                                label="Description"
                                                                v-model="editedItem.rDescription"
                                                                :rules="nameRules"
                                                                auto-grow
                                                                outlined
                                                                rows="5"
                                                                row-height="25"
                                                                shaped
                                                                @keydown="nameKeydown($event)"
                                                              ></v-textarea>
                                                               
                                                                <v-text-field
                                                                v-model="editedItem.rCost"
                                                                :rules="nameRules"
                                                                label="Claim Cost(Rs):"
                                                                required @keypress="isNumber($event)"
                                                                ></v-text-field>

                                                             <v-menu
                                                                  ref="menu"
                                                                  v-model="menu"
                                                                  :close-on-content-click="false"
                                                                  :return-value.sync="editedItem.rDate"
                                                                  transition="scale-transition"
                                                                  offset-y
                                                                  min-width="290px"
                                                                >
                                                                  <template v-slot:activator="{ on, attrs }">
                                                                    <v-text-field
                                                                      v-model="editedItem.rDate"
                                                                      label="Picker in menu"
                                                                      prepend-icon="mdi-calendar"
                                                                      readonly
                                                                      v-bind="attrs"
                                                                      v-on="on"
                                                                    ></v-text-field>
                                                                  </template>
                                                                  <v-date-picker
                                                                    v-model="editedItem.rDate"
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
                                                                      @click="$refs.menu.save(editedItem.rDate)"
                                                                    >
                                                                      OK
                                                                    </v-btn>
                                                                  </v-date-picker>
                                                                </v-menu>

                                                              <v-text-field
                                                                v-model="editedItem.place"
                                                                :rules="nameRules"
                                                                label="Place:"
                                                                required @keydown="nameKeydown($event)"
                                                                ></v-text-field>

                                                              <v-row>
                                                                  <v-col col="12" sm="4" >
                                                                           <v-text-field
                                                                            v-model="editedItem.vehicleNumber"
                                                                            :rules="nameRules"
                                                                            label="Vehicle Number:"
                                                                            required
                                                                            ></v-text-field>
                                                                  </v-col>

                                                                  <v-col col="12" sm="4" >
                                                                            <v-text-field
                                                                            v-model="editedItem.adminId"
                                                                            :rules="nameRules"
                                                                            label="Admin Id:"
                                                                            required @keypress="isNumber($event)"
                                                                            ></v-text-field>
                                                                          
                                                                          </div>
                                                                  </v-col>

                                                                  <v-col col="12" sm="4" >
                                                                            <v-text-field
                                                                            v-model="editedItem.agId"
                                                                            :rules="nameRules"
                                                                            label="Agent Id:"
                                                                            required @keypress="isNumber($event)"
                                                                            ></v-text-field>
                                                                  </v-col>
                                                        </v-row>

                                                        <!-- <v-row>
                                                                  <v-col col="12" sm="4" >
                                                                    
                                                                      <v-select 
                                                                      v-model="editedItem.isAccepted"
                                                                      :items="status"
                                                                      
                                                                      solo
                                                                      label="Status:"
                                                                      ></v-select>
                                                                                
                                          
                                                                  </v-col>
                                                        </v-row> -->
                                                           
                                                        <v-card-actions>
                                                                      <v-spacer></v-spacer>
                                                                    
                                                                      <v-btn v-if="formTitle=='New Item'"
                                                                        type="submit"
                                                                        :disabled="!valid"
                                                                        color="blue darken-1"
                                                                        text
                                                                        @click="save"
                                                                      
                                                                      >
                                                                        Submit
                                                                      </v-btn>

                                                                      <v-btn v-if="formTitle=='Edit Item'"
                                                                        type="submit"
                                                                        :disabled="!valid"
                                                                        color="blue darken-1"
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
        <!-- <v-dialog v-model="dialogDelete" max-width="1000px">
          <v-card>
            <v-card-title class="headline">Are you sure you want to delete this item?</v-card-title>
            <v-card-actions>
              <v-spacer></v-spacer>
              <v-btn color="blue darken-1" text @click="closeDelete">Cancel</v-btn>
              <v-btn color="blue darken-1" text @click="deleteItemConfirm">OK</v-btn>
              <v-spacer></v-spacer>
            </v-card-actions>
          </v-card>
        </v-dialog> -->
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
      <!-- <v-btn
        color="red"
        small
        @click="deleteItem(item)"
      >
        <v-icon>mdi-delete</v-icon>
      </v-btn> -->
    </template>
   
  </v-data-table>
  </base-material-card>


  </v-container>
</template>


<script>

import Axios from '../../../baseURL'

  export default {
    data: () =>({
     
      items:[],
      search:'',
      dialog: false,
      loading:false,
      loader:null,
      //dialogDelete: false,
      editedIndex: -1,
      menu:'',
      colr:'blue lighten-5',
        headers: [
        {
          text: 'Report Id',
          align: 'start',
          value: 'rId',
        },
        { text: 'Description', value: 'rDescription',sortable: false  },
        { text: 'Claim Cost', value: 'rCost' },
        { text: 'Claim Date', value: 'rDate' ,sortable: false },
        { text: 'Place', value: 'place',sortable: false  },
        { text: 'Vehicle Number', value: 'vehicleNumber',sortable: false  },
        { text: 'Admin Id', value: 'adminId',sortable: false  },
        { text: 'Agent Id', value: 'agId',sortable: false  },
        { text: 'Status', value: 'isAccepted',sortable: false  },
        { text: 'Actions', value: 'actions', sortable: false },
      ],

      editedItem:{
        rDescription:'',
        rCost:'',
        rDate:'',
        place:'',
        vehicleNumber:'',
        adminId:'',
        agId:'',

      },

      defaultItem:{
        rDescription:'',
        rCost:'',
        rDate:'',
        place:'',
        vehicleNumber:'',
        adminId:'',
        agId:'',

      },
        
        // status: [
        //         'Accepted',
        //         'Rejected',
        //     ],
            
        nameRules: [v => !!v || '*this field is required',],
      //   email: '',
      //   emailRules: [
      //   v => !!v || 'E-mail is required',
      //   v => /.+@.+\..+/.test(v) || 'E-mail must be valid',
      // ],

        valid: true,
      

    }),

    computed: {
      formTitle () {
        return this.editedIndex === -1 ? 'New Item' : 'Edit Item'
      },
    },
  
      methods:{
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

      submit()
      {
          this.$refs.form.validate()
          this.clear();

          Axios.post('put_report',{
            
               rDescription: this.editedItem.rDescription,
               rCost: this.editedItem.rCost,
               rDate: this.editedItem.rDate,
               place: this.editedItem.place,
               vehicleNumber: this.editedItem.vehicleNumber,
               adminId: this.editedItem.adminId,
               agId: this.editedItem.agId,
            
          }).then(Response=>{
        
          console.log(Response.data);
          this.s('New Report is added successfully');
    
        }).catch(function(error){
          console.log(error);
          
        })

        this.close();
        
          
      },

      clear()
      {
          this.rDescription= '',
          this.rCost='',
          this.rDate='',
          this.place='',
          this.vehicleNumber='',
          this.adminId='',
          this.agId=''
          //this.select=null
      },

      editItem (item) {
        this.editedIndex = this.items.indexOf(item)
        this.editedItem = Object.assign({}, item)
        this.dialog = true

        //console.log(this.editedItem);

      },

      updateItem()
      {
        

         Axios.put('edit_report/'+this.editedItem.rId,this.editedItem).then(Response=>{
          
                    this.s('report is successfully updated');
          }).catch(function(error){
          console.log(error);
           this.swr();
        })
        

      },

      // deleteItem (item) {
      //   this.editedIndex = this.items.indexOf(item)
      //   this.editedItem = Object.assign({}, item)
      //   this.dialogDelete = true

        
      // },

      // deleteItemConfirm () {
      //   this.items.splice(this.editedIndex, 1)
      //   this.closeDelete()

      //    Axios.put('delete_report/'+this.editedItem.rId,this.editedItem).then(Response=>{
      //           this.s('report is successfully deleted');
      //     }).catch(function(error){
      //     console.log(error);
      //     this.swr();
      //   })
      // },

       close () {
        this.dialog = false
        this.$nextTick(() => {
          this.editedItem = Object.assign({}, this.defaultItem)
          this.editedIndex = -1
        })
      },

      // closeDelete () {
      //   this.dialogDelete = false
      //   this.$nextTick(() => {
      //     this.editedItem = Object.assign({}, this.defaultItem)
      //     this.editedIndex = -1
      //   })
      // },

      save () {
        if (this.editedIndex > -1) {
          this.updateItem();
        } else {
          this.submit();}
        this.close();
      },

      
      searchById(){
          this.loading=true;
          Axios.get('filter_report_id/'+this.search).then(Response=>{
                    this.items=Response.data;
                    console.log(Response.data);
                    this.loading=false;
                  }).catch(error=>{
                    console.log(error);
                  });

          
      },

      searchByDescription(){
          Axios.get('filter_report_description/'+this.search).then(Response=>{
                    this.items=Response.data;
                    console.log(Response.data);
                  }).catch(error=>{
                    console.log(error);
                  });

      },
      searchByDate(){
        Axios.get('filter_report_date/'+this.search).then(Response=>{
                    this.items=Response.data;
                    console.log(Response.data);
                  }).catch(error=>{
                    console.log(error);
                  });
      },
      searchByPlace(){
        Axios.get('filter_report_place/'+this.search).then(Response=>{
                    this.items=Response.data;
                    console.log(Response.data);
                  }).catch(error=>{
                    console.log(error);
                  });
      },
      searchByVehicleNumber(){
        Axios.get('filter_report_vehicleNumber/'+this.search).then(Response=>{
                    this.items=Response.data;
                    console.log(Response.data);
                  }).catch(error=>{
                    console.log(error);
                  });
      },
      searchByAdminId(){
        Axios.get('filter_report_adminId/'+this.search).then(Response=>{
                    this.items=Response.data;
                    console.log(Response.data);
                  }).catch(error=>{
                    console.log(error);
                  });
      },
      searchByAgentId(){
        Axios.get('filter_report_agentId/'+this.search).then(Response=>{
                    this.items=Response.data;
                    console.log(Response.data);
                  }).catch(error=>{
                    console.log(error);
                  });
      },

      getColor (status) {
        if (status==0) return 'red'
        
        else return 'green'
      },

      getStatus(status)
      {
        if(status==0) return 'pending'
        else return 'Accepted'
      }

     

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
    
      
    Axios.get('report').then(Response=>{
          this.items=Response.data;
          console.log(Response.data);
          //console.log(this.items);
        }).catch(function(error){
          console.log(error);
        })
        
      
    },
   

   
}
</script>










  