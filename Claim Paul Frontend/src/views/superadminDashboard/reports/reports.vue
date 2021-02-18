<template>
<v-container
    id="reports"
    fluid
    tag="section"
>
 <base-material-card
 color="success"
 icon="mdi-text-box-multiple-outline"
 title="ClaimPaul Reports "
 class=" px-5 py-3"
 >
  <v-data-table
 :headers="headers"
 :items="items" 
 sort-by="rId"
 class="elevation-1"
  >
  
     
    <template v-slot:top>
      <v-toolbar
        flat
      >
        <v-toolbar-title>Reports Table</v-toolbar-title>
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
            vertical></v-divider>

            <v-btn
              color="primary"
              dark
              class="mb-2"
              v-bind="attrs"
              v-on="on"
            >
              New Item
            </v-btn>
             
             <v-text-field
                  append-icon="mdi-magnify"
                  single-line
                  hide-details
                  placeholder="Enter Report Id"
                  class="col-md-4 pr-4"
                  v-model="search"
            ></v-text-field>
          </template>
          <v-card>
            <v-card-title>
              <span class="headline">{{ formTitle }}</span>
             
                <v-icon large class="float-right" @click="dialog = false">mdi-close-circle-outline</v-icon>
                 
            </v-card-title>

           <v-card-text>
            <v-container>
                                                  
              <v-form ref="form" v-model="valid" lazy-validation>
                <v-textarea label="Description" v-model="editedItem.rDescription"
                 :rules="nameRules" auto-grow outline rows="5" row-height="25" shaped>
                </v-textarea>                     
                <v-text-field v-model="editedItem.rCost" :rules="nameRules" label="Claim Cost:" required>
                </v-text-field>
                <v-text-field v-model="editedItem.rDate" :rules="nameRules" label="Claim Date:" required>
                 </v-text-field>
                <v-text-field v-model="editedItem.place" :rules="nameRules" label="Place:" required> </v-text-field>
                <v-row>
                  <v-col col="12" sm="4" >
                    <v-text-field v-model="editedItem.vehicleNumber" :rules="nameRules" label="Vehicle Number:" required>
                      </v-text-field>
                  </v-col>
                  <v-col col="12" sm="4" >
                  <v-text-field v-model="editedItem.adminId" :rules="nameRules" label="Admin Id:" required>
                  </v-text-field>
                  </div>
                  </v-col>
                  <v-col col="12" sm="4" >
                  <v-text-field
                    v-model="editedItem.agId" :rules="nameRules" label="Agent Id:" required>
                  </v-text-field>
                  </v-col>
                  </v-row>
                  <v-row>
                    <v-col col="12" sm="4" >
                      <v-select v-model="editedItem.isAccepted" :items="status" solo label="Status:">
                      </v-select>
                      </v-col>
                  </v-row>
                  <v-card-actions>
                    <v-spacer></v-spacer>
                      <v-btn v-if="formTitle=='New Item'"
                      type="submit" :disabled="!valid" color="blue darken-1" text @click="save">Submit
                      </v-btn>
                      <v-btn v-if="formTitle=='Edit Item'" 
                      type="submit" :disabled="!valid" color="blue darken-1" text @click="save"> Update
                      </v-btn>
                      <v-btn color="blue darken-1" text @click="clear">Clear
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
      </v-toolbar>
    </template>
    <template v-slot:item.actions="{ item }">
      <v-btn small color="blue" class="mr-2" @click="editItem(item)">
        <v-icon>mdi-pencil</v-icon> 
      </v-btn>
      <v-btn color="red" small @click="deleteItem(item)">
        <v-icon>mdi-delete</v-icon>
      </v-btn>
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
      dialog: false,
      dialogDelete: false,
      editedIndex: -1,
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

        isAccepted:'pending',
      },

      defaultItem:{
        rDescription:'',
        rCost:'',
        rDate:'',
        place:'',
        vehicleNumber:'',
        adminId:'',
        agId:'',

        isAccepted:'pending',
      },
        
        status: [
                'Accepted',
                'Rejected',
            ],
            
        nameRules: [v => !!v || '*this field is required',],
      //   email: '',
      //   emailRules: [
      //   v => !!v || 'E-mail is required',
      //   v => /.+@.+\..+/.test(v) || 'E-mail must be valid',
      // ],

        valid: true,
        search:'',
    }),

    computed: {
      formTitle () {
        return this.editedIndex === -1 ? 'New Item' : 'Edit Item'
      },
    },

 
      methods:{

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
          this.swr();
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
          this.agId='',
          this.select=null
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

      deleteItem (item) {
        this.editedIndex = this.items.indexOf(item)
        this.editedItem = Object.assign({}, item)
        this.dialogDelete = true

        
      },

      deleteItemConfirm () {
        this.items.splice(this.editedIndex, 1)
        this.closeDelete()

         Axios.put('delete_report/'+this.editedItem.rId,this.editedItem).then(Response=>{
                this.s('report is successfully deleted');
          }).catch(function(error){
          console.log(error);
          this.swr();
        })
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










  