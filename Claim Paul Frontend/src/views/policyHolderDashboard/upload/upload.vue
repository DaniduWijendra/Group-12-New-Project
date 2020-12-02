<template>
  <v-container
    id="dashboard"
    fluid
    tag="section"
  >
  <base-material-card color='blue'>
     <template v-slot:heading >
            <div class="display-2 font-weight-light ">
              Cost Estimation
            </div>

            <div class="subtitle-1 font-weight-light">
              Upload photo
            </div>
    </template>

  <v-form
  ref="form"
 class='px-6'
 >
    <v-row>                                                        

      <v-col col='12' sm='6'>
          <div class="dropbox">
              <input type="file"class="input-file" name='image1' @change="getImage1($event)">
                  <p>
                      for front side damages
                    <img src="../../../assets/img/policyholder/carUpload3.png" style='width:100px;height:100px;' alt="" class='px-2 py-3'>
                  </p>
                        
              </div>
      </v-col>

      <v-col col='12' sm='6'>
          <div class="dropbox">
              <input type="file"class="input-file" name='image2' @change="getImage2($event)">
                  <p>
                    for back  side damages
                     <img src="../../../assets/img/policyholder/carUpload4.png" style='width:100px;height:100px;' alt="" class='px-4 py-4'>
                  </p>
                        
              </div>
      </v-col>

                                                          

    </v-row>

    <v-row>                                                        

      <v-col col='12' sm='6'>
          <div class="dropbox">
              <input type="file"class="input-file" name='image3' @change="getImage3($event)">
                  <p>
                      for left side damages
                     <img src="../../../assets/img/policyholder/carUpload1.png" style='width:100px;height:100px;' alt="" >
                  </p>
                        
              </div>
      </v-col>

      <v-col col='12' sm='6'>
          <div class="dropbox">
              <input type="file"class="input-file" name='image4' @change="getImage4($event)">
                  <p>
                      for right side damages
                     <img src="../../../assets/img/policyholder/carUpload2.png" style='width:100px;height:100px;' alt="" >
                  </p>
                        
              </div>
      </v-col>

                                                          

    </v-row>

                                                       
         <v-card-actions>
                    <v-spacer></v-spacer>
                                                                    
                    <v-btn 
                      type="submit"
                      color="blue darken-1"
                      text
                      @click="submit"
                                                                      
                    >
                      Submit
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
  
</base-material-card >

<v-card  class='mx-6'>
   
    <v-container>
      <v-row>
        <v-col cols="12">
          <v-text-field
            v-model="message"
            outlined
            clearable
            label="Message"
            type="text"
          >
            <template v-slot:prepend>
              <v-tooltip
                bottom
              >
                <template v-slot:activator="{ on }">
                  <v-icon v-on="on">
                    mdi-help-circle-outline
                  </v-icon>
                </template>
                I'm a tooltip
              </v-tooltip>
            </template>
            <template v-slot:append>
              <v-fade-transition leave-absolute>
                <v-progress-circular
                  v-if="loading"
                  size="24"
                  color="info"
                  indeterminate
                ></v-progress-circular>
                <img
                  v-else
                  width="24"
                  height="24"
                  src="https://cdn.vuetifyjs.com/images/logos/v-alt.svg"
                  alt=""
                >
              </v-fade-transition>
            </template>
         
          </v-text-field>
        </v-col>
      </v-row>
    </v-container>
  
  </v-card>
     
    
  </v-container>
</template>

<script>
export default {
   data:()=>({

            
          
            message: 'Hey!',
            loading: false,
            editedItem:{
           
            image1:'',
            image2:'',
            image3:'',
            image4:'',
        
            },

            rules: [
                value => !!value || 'Required.',
                value => (value && value.length >= 3) || 'Min 3 characters',
            ],

           
        }),

        methods:{

        submit(){

          this.$refs.form.validate()
          this.clear();

          Axios.post('add_image',{
            
              
               image1: this.editedItem.image1,
               image2: this.editedItem.image2,
               image3: this.editedItem.image3,
               image4: this.editedItem.image4,
            
          }).then(Response=>{
        
          console.log(Response.data);
          this.s('4 Images are added successfully');
    
        }).catch(function(error){
          console.log(error);
        
        })

        this.close();
        
          
      },
          getImage1(e)
          {
            var fileReader=new FileReader();

            fileReader.readAsDataURL(e.target.files[0]);

            fileReader.onload=(e)=>{

            this.editedItem.image1=e.target.result;
            this.s(' Image 1 is added successfully');
        };

            console.log(this.editedItem.image1);
        },

         getImage2(e)
          {
            var fileReader=new FileReader();

            fileReader.readAsDataURL(e.target.files[0]);

            fileReader.onload=(e)=>{

            this.editedItem.image2=e.target.result;
             this.s(' Image 2 is added successfully');
        };

            console.log(this.editedItem.image2);
        },

         getImage3(e)
          {
            var fileReader=new FileReader();

            fileReader.readAsDataURL(e.target.files[0]);

            fileReader.onload=(e)=>{

            this.editedItem.image3=e.target.result;
             this.s(' Image 3 is added successfully');
        };

            console.log(this.editedItem.image3);
        },
         getImage4(e)
          {
            var fileReader=new FileReader();

            fileReader.readAsDataURL(e.target.files[0]);

            fileReader.onload=(e)=>{

            this.editedItem.image4=e.target.result;
            this.s(' Image 4 is added successfully');
        };

            console.log(this.editedItem.image4);
        },

        clear()
        {
          this.image1= null,
          this.image2= null,
          this.image3= null,
          this.image4= null
          
        }
    }
}
</script>

<style scoped>
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