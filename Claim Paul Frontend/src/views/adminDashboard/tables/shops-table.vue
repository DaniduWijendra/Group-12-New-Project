<template>
<v-container
    id="dashboard"
    fluid
    tag="section"
>
 <base-material-card
 color="success"
 icon="mdi-text-box-multiple-outline"
 title="Shops "
 class=" px-5 py-3"
 >
  <v-data-table
 :headers="headers"
 :items="items" 
 sort-by="shpId"
 class="elevation-1"
  >

     
    <template v-slot:top>
      <v-toolbar
        flat
      >
        <v-toolbar-title>Shop Table</v-toolbar-title>
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
             
             <v-text-field
                  append-icon="mdi-magnify"
                  single-line
                  hide-details
                  placeholder="Enter Shop Id"
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
                lazy-validation>
                    
                  <v-row>
                    <v-col col="12" sm="6" >
                     <v-text-field
                        v-model="editedItem.sName"
                        :rules="nameRules"
                        label="Shop Name:"
                        required
                        ></v-text-field>
                    </v-col>
                  
                      <v-col col="12" sm="6" >
                                <v-text-field
                                v-model="editedItem.sAddress"
                                :rules="nameRules"
                                label="Shop Address:"
                                required
                                ></v-text-field>
                      </v-col>
                  </v-row>
                  <v-row>
                      <v-col col="12" sm="6" >
                                <v-text-field
                                v-model="editedItem.sContact"
                                :rules="nameRules"
                                label="Shop Contact:"
                                required
                                ></v-text-field>
                              
                              
                      </v-col>

                      <v-col col="12" sm="6" >
                                <v-text-field
                                v-model="editedItem.sLocation"
                                :rules="nameRules"
                                label="Shop Location:"
                                required
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
          
            <v-btn v-if="formTitle=='Add New Shop'"
              type="submit"
              :disabled="!valid"
              color="primary"
              text
              @click="save"
            
            >
              Submit
            </v-btn>

            <v-btn v-if="formTitle=='Edit Shop'"
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
            
              <img v-bind:src="'http://127.0.0.1:8000/images/'+images.image" style="width:1000px;height:500px" alt="">
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
      v-bind:id='item.shpId'
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
      dialog: false,
      dialogDelete: false,
      dialogView:false,
      editedIndex: -1,
      menu:'',
      images:[],
        headers: [
        {
          text: 'Shop Id',
          align: 'start',
          value: 'shpId',
        },
        { text: 'Shop Name', value: 'sName',sortable: false  },
        { text: 'Shop Address', value: 'sAddress' },
        { text: 'Shop Contact', value: 'sContact' ,sortable: false },
        { text: 'Shop Location', value: 'sLocation',sortable: false  },
        { text: 'Image', value: 'image',sortable: false  },
        { text: 'Actions', value: 'actions', sortable: false },
      ],

      editedItem:{
        sName:'',
        sAddress:'',
        sContact:'',
        sLocation:'',
        image:'',
        
      },

       defaultItem:{
        sName:'',
        sAddress:'',
        sContact:'',
        sLocation:'',
        image:''
      },

       nameRules: [v => !!v || '*this field is required',],
        valid: true,
    }),

    computed: {
      formTitle () {
        return this.editedIndex === -1 ? 'Add New Shop' : 'Edit Shop'
      },
    },

   
    methods: {
      

      submit()
      {
          this.$refs.form.validate()
          this.clear();

          Axios.post('add_shops',{
            
               sName: this.editedItem.sName,
               sAddress: this.editedItem.sAddress,
               sContact: this.editedItem.sContact,
               sLocation: this.editedItem.sLocation,
               image: this.editedItem.image,
            
          }).then(Response=>{
        
          console.log(Response.data);
          this.s('New Report is added successfully');
    
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
        this.sName= '',
        this.sAddress='',
        this.sContact='',
        this.sLocation='',
        this.image=null
      },

      
      editItem (item) {
        this.editedIndex = this.items.indexOf(item)
        this.editedItem = Object.assign({}, item)
        this.dialog = true

        //console.log(this.editedItem);

        

        
      },

       updateItem()
      {
        

        Axios.put('edit_shop/'+this.editedItem.shpId,this.editedItem).then(Response=>{
          
                    this.s('vehicle is successfully updated');
          }).catch(function(error){
          console.log(error);
          
        })
        

      },

      viewImage(item)
      {

         Axios.get('get_shopimage/'+item.shpId).then(Response=>{

          this.images=Response.data.shop[0];
          
          
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

         Axios.put('delete_shop/'+this.editedItem.shpId,this.editedItem).then(Response=>{
                this.s('Shop is successfully deleted');
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