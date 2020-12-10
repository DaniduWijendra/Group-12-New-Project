<template>
<v-container
    id="dashboard"
    fluid
    tag="section"
  >

  <div>
  
  <v-app>
    <v-container>
      <v-row>
        <v-col>
          <h1>{{ heading }}</h1>
        </v-col>
      </v-row>
      <v-row>
        <v-col col="6" xs="2" md="2">

          <v-text-field
            placeholder="Enter report Id"
            filled
            prepend-inner-icon="mdi-magnify"
            rounded
            dense
            v-model="repoId" @keypress="isNumber($event)"
            class="auto-focus"
          ></v-text-field>
        </v-col>
        <v-col col="6" xs="2" sm="2">
          <v-btn color='primary' @click='inputData' >Input Data</v-btn>
        </v-col>
        
      
      </v-row>
            
    <v-card class="pa-4">
      <v-row>
        <v-col>
          <table>
            <tr>
              <td>Description</td>
              <td>{{reports.rDescription}}</td>
            </tr>
            <tr>
              <td>Cost</td>
              <td>{{reports.rCost}}</td>
            </tr>
            <tr>
              <td>Place</td>
              <td>{{reports.place}}</td>
            </tr>
            <tr>
              <td>Date</td>
              <td>{{reports.rDate}}</td>
            </tr>
            <tr>
              <td>Vehicle Number</td>
              <td>{{reports.vehicleNumber}}</td>
            </tr>
          </table>
         
          
        </v-col>
      </v-row>
       <v-card  class="d-flex flex-row mb-6">        
          <v-card-actions>
            
                    <v-btn color='red' @click='clear'>Clear</v-btn>
                    <v-btn color='orange' @click='generatePDF'>Generate PDF</v-btn>
              
          </v-card-actions>
      </v-card>
  </v-card>

<!-- mail part -->

<base-material-card color="blue"
        icon="mdi-text-box-multiple-outline"
      title="Send Messages to Agents"
      class=" px-5 py-3"
          > 
  <!-- <v-card-title>
        Input report pdf files below
    </v-card-title> -->
<v-form
    ref="form"
    lazy-validation
    v-on:submit.prevent='sendMail'
  >
     <v-text-field
    
    label="Your Name"
    outlined
    clearable
    prepend-icon="mdi-account"
    v-model="mail.name"
    ></v-text-field>

    <v-select v-model="mail.branch" prepend-icon="mdi-home-analytics" outlined :items="branch" label="Your Branch:" required>
    </v-select>

     <v-text-field   
    label="Topic"
    outlined
    clearable
    prepend-icon="mdi-text"
    v-model="mail.topic"
    ></v-text-field>

    <v-text-field
    label="email"
    outlined
    clearable
    prepend-icon="mdi-at"
    v-model="mail.agMail.email"
    readonly
    ></v-text-field>

    <v-textarea
    label="Message"
    auto-grow
    outlined
    rows="3"
    row-height="25"
    shaped
    prepend-icon="mdi-comment-quote"
    v-model="mail.complain"
    ></v-textarea>
    <input type="file" name="media" @click="uploadPdf">


    <v-btn
      
      color="blue"
      class="mr-4"
      fab
    >
      <v-icon large @click="sendMail">mdi-send-circle</v-icon>
    </v-btn>

    
  </v-form>
</base-material-card>
    </v-container>
  </v-app>
</div>
</v-container>
</template>

<script>

import { jsPDF } from "jspdf"
import 'jspdf-autotable'
import Axios from '../../../baseURL'

export default {
  data(){

    return{
      mail:{
        name:'',
        agMail:'',
        complain:'',
        file:'',
        branch:'',
        topic:'',
        role:'Admin',

      },
      agentMail:'',
      branch:[
           'Galle',
        'Matara',
        'Ambalangoda',
        'Kurunagala'
      ],
      repoId:'',
      heading: "Claim Paul Report",
      moreText: [
        "Buying insurance is not the most boring thing anymore! Well, even though it still may not be the most interesting task on your to-do-list",
         "we have tried our very best to make it as cool & practical as possible. We have even gone to the extent of offering insurance on a 'piece",
         "-meal' basis! So keep scrolling!!!!"
      ],
     
      reports:'',
        
      files: [],
      valid:true,
      email:{
        address:'',
        
      }
    }
    
    },

  methods: {
    uploadPdf(e)
    {
      let reader=new FileReader();
      // console.log('uploading');
      let file = e.target.files[0];
      console.log(file);
      reader.readAsDataURL(file);
      reader.onloadend=(file)=>
      {
        
        this.mail.file=reader.result;
      }
      
    },
    sendMail(){

          Axios.post('admin_mail',{
            name:this.mail.name,
            email:this.mail.agMail.email,
            complain:this.mail.complain,
            branch:this.mail.branch,
            topic:this.mail.topic,
            role:this.mail.role,
            
          }).then(()=>{

               this.s('Your Mail Successfully sent');

            }).catch(error=>{
                
                console.log(error.response.data.error);
          
            });

      },
    getAgentMail()
    {
      Axios.get('get_agentmail/'+this.repoId).then(Response=>{

          this.mail.agMail=Response.data.agent[0]; 
          //console.log(this.agMail);          
        }).catch(function(error){
          
              console.log(error);
              
            
        })
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
    sendPDF()
    {

    },
    inputData()
    {
      this.getAgentMail();
        Axios.get('get_report/'+this.repoId).then(Response=>{

          this.reports=Response.data.report[0];
          
          
              this.s("success");
          
          
        }).catch(function(error){
          
              console.log(error);
            
        })
    },

    clear(){

      this.repoId="";
      this.reports.rDescription="";
      this.reports.place="";
      this.reports.rDate="";
      this.reports.rCost="";
      this.reports.vehicleNumber="";

      

    },
    generatePDF() {

       
      
      var doc = new jsPDF({
        orientation: "portrait",
        unit: "in",
        format: "A4"
      });

      var w=doc.internal.pageSize.getWidth()-0.4;
      var h=doc.internal.pageSize.getHeight()-0.4;
      // add border
      doc.setLineWidth(0.01).rect(0.2,0.2,w,h,'S');
      // text is placed using x, y coordinates
      doc.setFontSize(14).text(this.heading, 0.5, 1.0);
      // create a line under heading 
      doc.setLineWidth(0.01).line(0.5, 1.1, 8.0, 1.1);
      
      // Using array of sentences
      doc.text(this.moreText, 0.5, 1.5, { align: "left", maxWidth: "7.5" });

      //doc.text('Description',0.5,2.5);
      //doc.text(this.reports.rDescription,1.5,2.5);

      doc.autoTable({
        
        body: [
            ['Description',this.reports.rDescription],
            ['Place',this.reports.place],
            ['Date(y-m-d)',this.reports.rDate],
            ['Cost',this.reports.rCost],
            ['Vehicle Number',this.reports.vehicleNumber],
            
            ],
          margin: { left: 0.5, top: 2.5 }
        
            
      })
    
      // Creating footer and saving file
      doc.autoPrint({variant:"non-conform"})

      doc.text(
          "This is a simple footer located .5 inches from page bottom",
          0.5,
          doc.internal.pageSize.height - 0.5
        )
       .save(`${this.heading}.pdf`);

      
        this.i('New Report is Generating');
        this.clear();
        //var pdf=doc.output();
        var pdf=doc.output('datauri');
        // console.log(pdf);
        // console.log('report id' + this.reports.rId);
        Axios.put('savePdf/'+this.reports.rId, null,
           {
              params: {'pdf':  doc.output('datauri')}          
           }).then(Response => (
           console.log(Response.data)
         ))
        .catch(error => console.log(error));
    }
  }
  
  
}
</script>

