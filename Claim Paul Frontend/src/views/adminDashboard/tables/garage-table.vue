<template>
<v-container
    id="dashboard"
    fluid
    tag="section"
>
 <base-material-card
 color="success"
 icon="mdi-text-box-multiple-outline"
 title="Garages "
 class=" px-5 py-3"
 >
  <v-data-table
 :headers="headers"
 :items="items" 
  :search="search" 
 sort-by="gId"
 class="elevation-1"
  >

     
    <template v-slot:top>
      <v-toolbar
        flat
      >
        <v-toolbar-title>Garage Table</v-toolbar-title>
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
            </v-btn> <v-divider
            class="mx-4"
            inset
            vertical></v-divider>
            
          <v-btn
              color="warning"
              dark
              class="mb-2"
              @click="searchById">
              Search
            </v-btn>
             
             <v-text-field
                  v-model="search"
                  append-icon="mdi-magnify"
                  single-line
                  hide-details
                  placeholder="Enter Garage Id"
                  class="col-md-4 pr-4" @keydown="nameKeydown($event)"
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
                lazy-validation>
                    
                  <v-row>
                    <v-col col="12" sm="6" >
                     <v-text-field
                     autofocus
                      v-model="editedItem.gName"
                      :rules="nameRules"
                      label="Garage Name:"
                      required @keydown="nameKeydown($event)"
                      ></v-text-field>
                    </v-col>
                  
                      <v-col col="12" sm="6" >
                                <v-text-field
                                v-model="editedItem.gAddress"
                                :rules="nameRules"
                                label="Garage Address:"
                                required @keydown="nameKeydown($event)"
                                ></v-text-field>
                      </v-col>
                  </v-row>
                  <v-row>
                      <v-col col="12" sm="6" >
                                <v-text-field
                                v-model="editedItem.gContactNo"
                                :rules="nameRules"
                                label="Garage Contact:"
                                required @keypress="isNumber($event)" maxlength="10"
                                ></v-text-field>
                              
                              
                      </v-col>

                      <v-col col="12" sm="6" >
                                <v-text-field
                                v-model="editedItem.gLocation"
                                :rules="nameRules"
                                label="Garage Location:"
                              required @keydown="nameKeydown($event)"
                                ></v-text-field>
                      </v-col>
                  </v-row><v-row>
                      <v-col col="12" sm="12">
                    <div class="dropbox">
                        <input type="file" class="input-file" name='image' @change="getImage($event)">
                        <p>
                          Drag your file(s) here to begin<br> or click to browse
                        </p>

                    </div>
            </v-col>
            </v-row>

                  
          <v-card-actions>
            <v-spacer></v-spacer>
          
            <v-btn v-if="formTitle=='Add New Garage'"
              type="submit"
              :disabled="!valid"
              color="primary"
              text
              @click="save"
            
            >
              Submit
            </v-btn>

            <v-btn v-if="formTitle=='Edit Garage'"
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
      v-bind:id='item.gId'
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
      loading:false,
      loader:null,
      dialog: false,
      dialogDelete: false,
      dialogView:false,
      editedIndex: -1,
      menu:'',
      images:[],
        headers: [
        {
          text: 'Garage Id',
          align: 'start',
          value: 'gId',
        },
        { text: 'Garage Name', value: 'gName',sortable: false  },
        { text: 'Garage Address', value: 'gAddress' },
        { text: 'Garage Contact', value: 'gContactNo' ,sortable: false },
        { text: 'Garage Location', value: 'gLocation',sortable: false  },
        { text: 'Image', value: 'image',sortable: false  },
        { text: 'Actions', value: 'actions', sortable: false },
      ],

      editedItem:{
        gName:'',
        gAddress:'',
        gContactNo:'',
        gLocation:'',
        image:'',
        
      },

       defaultItem:{
        gName:'',
        gAddress:'',
        gContactNo:'',
        gLocationNo:'',
        image:''
      },

       nameRules: [v => !!v || '*this field is required',],
        valid: true,
    }),

    computed: {
      formTitle () {
        return this.editedIndex === -1 ? 'Add New Garage' : 'Edit Garage'
      },
    },

   
    methods: {
      searchById(){
          this.loading=true;
          Axios.get('filter_garage_id/'+this.search).then(Response=>{
                    this.items=Response.data;
                    console.log(Response.data);
                    this.loading=false;
                  }).catch(error=>{
                    console.log(error);
                  });
      },
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
          //this.clear();

          Axios.post('add_garage',{
            
               gName: this.editedItem.gName,
               gAddress: this.editedItem.gAddress,
               gContactNo: this.editedItem.gContactNo,
               gLocation: this.editedItem.gLocation,
               image: this.editedItem.image,
            
          }).then(Response=>{
        
          console.log(Response.data);
          this.s('New Garage is added successfully');
    
        }).catch(function(error){
          console.log(error);
            
        })

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
        this.editedItem.gName= '',
        this.editedItem.gAddress='',
        this.editedItem.gContactNo='',
        this.editedItem.gLocation='',
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
        

        Axios.put('edit_garage/'+this.editedItem.gId,this.editedItem).then(Response=>{
          
                    this.s('Garage is successfully updated');
          }).catch(function(error){
          console.log(error);
          
        })
        

      },

      viewImage(item)
      {

         Axios.get('get_garageimage/'+item.gId).then(Response=>{

          this.images=Response.data.garage[0];
          
          
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

         Axios.put('delete_garage/'+this.editedItem.gId,this.editedItem).then(Response=>{
                this.s('Garage is successfully deleted');
          }).catch(function(error){
          console.log(error);
        
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
    
      
    Axios.get('get_garages').then(Response=>{
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