<template>
<v-container
    id="dashboard"
    fluid
    tag="section">
 <base-material-card
 color="success"
 icon="mdi-text-box-multiple-outline"
 title="Spare Parts "
 class=" px-5 py-3">
  <v-data-table
 :headers="headers"
 :items="items" 
 sort-by="sparePrtId"
 class="elevation-1">

     
    <template v-slot:top>
      <v-toolbar flat>
        <v-toolbar-title>Spare Parts Table</v-toolbar-title>
        <v-divider
          class="mx-4"
          inset
          vertical></v-divider>
        <v-spacer></v-spacer>
        <v-dialog
          v-model="dialog"
          max-width="1000px">
          <template v-slot:activator="{ on, attrs }">
          
            <v-btn
              color="primary"
              dark
              class="mb-2"
              v-bind="attrs"
              v-on="on">
              +New Item
            </v-btn>
             
                <v-text-field
                  append-icon="mdi-magnify"
                  single-line
                  hide-details
                  placeholder="Enter Spare Part Id"
                  class="col-md-4 pr-4">
                </v-text-field>
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
                      <v-col col="12" sm="12" >
                     <v-text-field
                        v-model="editedItem.partId"
                        :rules="nameRules"
                        label="Part Id:"
                        required>
                      </v-text-field>
                      </v-col>
                    </v-row>
                    <v-row>
                      <v-col col="12" sm="12" >
                      <v-text-field
                      v-model="editedItem.sparePrtName"
                      :rules="nameRules"
                      label="Spare Part Name:"
                      required
                      ></v-text-field>
                      </v-col>
                    </v-row>
                      <v-row>
                      <v-col col="12" sm="4" >
                        <v-select v-model="editedItem.brand" :rules="nameRules" :items="vehicleType" label="Spare Part Brand:">
                      </v-select>            
                              
                      </v-col>
                      
                      
                      <v-col col="12" sm="4" >
                                <v-text-field
                                v-model="editedItem.model"
                                :rules="nameRules"
                                label="Spare Part Model:"
                                required
                                ></v-text-field>
                      </v-col>
                      
                       <v-col col="12" sm="4" >
                                <v-text-field
                                v-model="editedItem.year"
                                :rules="nameRules"
                                label="Spare Part Year:"
                                required
                                ></v-text-field>
                      </v-col></v-row>
                      <v-row>
                    
                       <v-col col="12" sm="6" >
                                <v-text-field
                                v-model="editedItem.price"
                                :rules="nameRules"
                                label="Spare Part Price:"
                                required
                                ></v-text-field>
                      </v-col>
                     
                      <v-col col="12" sm="6">
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
          
            <v-btn v-if="formTitle=='Add New Spare Part'"
              type="submit"
              :disabled="!valid"
              color="primary"
              text
              @click="save"
            
            >
              Submit
            </v-btn>

            <v-btn v-if="formTitle=='Edit Spare Part'"
              type="submit"
              :disabled="!valid"
              color="warning"
              text
              @click="save">
              Update
            </v-btn>

            <v-btn
              color="blue darken-1"
              text
              @click="clear">
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
      v-bind:id='item.sparePrtId '
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
          text: 'Spare Part Id',
          align: 'start',
          value: 'sparePrtId',
        },
        { text: 'Part Id', value: 'partId',sortable: false  },
        { text: 'Spare Name', value: 'sparePrtName',sortable: false  },
        { text: 'Brand', value: 'brand',sortable: false },
        { text: 'Model', value: 'model' ,sortable: false },
        { text: 'Car Maufacture Year', value: 'year',sortable: false  },
        { text: 'Spare Price', value: 'price' ,sortable: false },
        { text: 'Image', value: 'image',sortable: false  },
        { text: 'Actions', value: 'actions', sortable: false },
      ],
      vehicleType:[
        'Audi',
        'Alfa Romio',
        'BMW',
        'Izuzu',
        'Toyota',
        'Honda',
        'Hyhundai',
        'Mistubushi',
        'Nissan',
        'Tata'
      ],

      editedItem:{
        partId:'',
        sparePrtName:'',
        brand:'',
        model:'',
        year:'',
        price:'',
        image:''
      },

       defaultItem:{
        partId:'',
        sparePrtName:'',
        brand:'',
        model:'',
        year:'',
        price:'',
        image:''
      },

       nameRules: [v => !!v || '*this field is required',],
        valid: true,
    }),

    computed: {
      formTitle () {
        return this.editedIndex === -1 ? 'Add New Spare Part' : 'Edit Spare Part'
      },
    },

   
    methods: {
      

      submit()
      {
          this.$refs.form.validate()
          this.clear();

          Axios.post('add_sparepart',{
            
              partId: this.editedItem.partId,
              sparePrtName: this.editedItem.sparePrtName,
              brand: this.editedItem.brand,
              model: this.editedItem.model,
              year: this.editedItem.year,
              price: this.editedItem.price,
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
        this.partId= '',
        this.brand='',
        this.model='',
        this.year='',
        this.price='',
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
        

        Axios.put('edit_sparepart/'+this.editedItem.sparePrtId,this.editedItem).then(Response=>{
          
                    this.s('Spare Part is successfully updated');
          }).catch(function(error){
          console.log(error);
          
        })
        

      },

      viewImage(item)
      {

         Axios.get('get_spareimage/'+item.sparePrtId).then(Response=>{

          this.images=Response.data.spare[0];
          
          
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

         Axios.put('delete_sparepart/'+this.editedItem.sparePrtId,this.editedItem).then(Response=>{
                this.s('Spare Part is successfully deleted');
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
    
      
    Axios.get('get_sparepart').then(Response=>{
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