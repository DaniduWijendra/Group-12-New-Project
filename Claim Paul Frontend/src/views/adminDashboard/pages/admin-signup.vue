<template>
<div class="d-flex justify-center mt-10">
    <v-app>
        
        <v-flex xs12 sm12 md12 lg12 >
        <v-card class="text-center ma-6" max-width="800" color="#3197b2">
             <v-card-title class="justify-center">
        <h2 style="color:#fff; font-size:3rem">Admin Registration Form</h2>
      </v-card-title>
                            <v-card-text>
                                <v-form ref="registerForm" v-model="valid" lazy-validation>
                                    <v-row>
                                        <v-col cols="12" sm="4" md="4" >
                                           <v-text-field prepend-icon="mdi-form-textbox" v-model="firstName" :rules="[rules.required,rules.namelength]" label="First Name" maxlength="20" required></v-text-field>
                                        </v-col>
                                        <v-col cols="12" sm="4" md="4">
                                            <v-text-field prepend-icon="mdi-form-textbox" v-model="lastName" :rules="[rules.required,rules.namelength]" label="Last Name" maxlength="20" required></v-text-field>
                                        </v-col>
                                         <v-col cols="12" sm="4" md="4" >
                                           <v-text-field prepend-icon="mdi-account-circle" v-model="username" :rules="[rules.required,rules.namelength]" label="User Name" maxlength="20" required></v-text-field>
                                        </v-col>
                                        <v-col cols="12" sm="8" md="8">
                                            <v-text-field prepend-icon="mdi-home" v-model="address" :rules="[rules.required]" label="Address" required></v-text-field>
                                        </v-col>
                                        
                                        
                                        <!-- gender begin -->
                                        <v-col cols="12" sm="4" md="4">
                                            <v-select
                                        v-model="sex"
                                        :items="gender"
                                        menu-props="auto"
                                        label="Select"
                                        hide-details
                                        :rules="[rules.required]"
                                        prepend-icon="mdi-human-male-female"
                                        single-line
                                        ></v-select>
                                        </v-col>

                                        <!-- bday begins -->
                                         <v-col cols="12" sm="4" md="4" >
                                          <v-menu
            
            v-model="fromDateMenu"
            :close-on-content-click="false"
            :nudge-right="40"
            transition="scale-transition"
            offset-y 
            max-width="290px"
            min-width="290px"
          >
            <template v-slot:activator="{ on }">
              <v-text-field
                
                label="Birth Date"
                prepend-icon="event"
                readonly
                :rules="[rules.required]"
                :value="fromDateDisp"
                v-on="on"
              ></v-text-field>
            </template>
            <v-date-picker
              locale="en-in"
              v-model="fromDateVal"
              no-title
              @input="fromDateMenu = false"
              :min="minDate"
            ></v-date-picker>
          </v-menu>
                                        </v-col>

                                         <v-col cols="12" sm="4" md="4" >
                                           <v-text-field type="number" class="inputPrice"  v-model="contact" :rules="[rules.required,rules.tel]" label="Contact" maxlength="20" required></v-text-field>
                                        </v-col>

                                        <v-col cols="12" sm="4" md="4" >
                                           <v-text-field prepend-icon="mdi-email" v-model="email" :rules="emailRules" label="E mail" required></v-text-field>
                                        </v-col>

                                         <v-col cols="12" sm="6" md="6" >
                                           <!-- branch begins -->
                                          <v-select
                                        v-model="branch"
                                        :items="brancharr"
                                        menu-props="auto"
                                        label="Select Branch"
                                        hide-details
                                        :rules="[rules.required]"
                                        prepend-icon="mdi-home-analytics"
                                        single-line
                                        ></v-select>
                                        </v-col>


                                        <v-col cols="12">
                                            <v-text-field v-model="password" prepend-icon="mdi-lock" :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'" :rules="[rules.required, rules.min]" :type="show1 ? 'text' : 'password'" name="input-10-1" label="Password" hint="At least 8 characters" counter @click:append="show1 = !show1"></v-text-field>
                                        </v-col>
                                        <v-col cols="12">
                                            <v-text-field block prepend-icon="mdi-lock" v-model="verify" :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'" :rules="[rules.required, passwordMatch]" :type="show1 ? 'text' : 'password'" name="input-10-1" label="Confirm Password" counter @click:append="show1 = !show1"></v-text-field>
                                        </v-col>
                                        <v-spacer></v-spacer>
                                        <v-col class="d-flex ml-auto" cols="12" sm="3" xsm="12">
                                            <v-btn x-large block :disabled="!valid" color="success" @click="validate">Register</v-btn>
                                        </v-col>
                                    </v-row>
                                </v-form>
                            </v-card-text>
                        </v-card>
        </v-flex>
       
    </v-app>
     </div>
</template>
<style>


 .inputPrice input[type='number'] {
    -moz-appearance:textfield;
}
.inputPrice input::-webkit-outer-spin-button,
.inputPrice input::-webkit-inner-spin-button {
    -webkit-appearance: none;
}
</style>
<script>

export default {
  
  computed: {
    passwordMatch() {
      return () => this.password === this.verify || "Password must match";
      
    },
     fromDateDisp() {
        return this.fromDateVal;
        // format date, apply validations, etc. Example below.
        // return this.fromDateVal ? this.formatDate(this.fromDateVal) : "";
      },
  },
  methods: {
    
    validate() {
      if (this.$refs.loginForm.validate()) {
        // submit form to server/API here...
      }
    },
    reset() {
      this.$refs.form.reset();
    },
    resetValidation() {
      this.$refs.form.resetValidation();
    }
  },
  data: () => ({
    dialog: true,
   
    tabs: [
        {name:"Register"}
    ],
    valid: true,
    
    firstName: "",
    lastName: "",
    username:"",
    address:"",
    email: "",
    fromDateVal:"",
    sex:"",
    branch:"",
    contact:"",
    password: "",
    verify: "",
    // loginPassword: "",
    // loginEmail: "",
    loginEmailRules:
    [
      v => !!v || "Required",
      v => /.+@.+\..+/.test(v) || "E-mail must be valid"
    ],
    emailRules: [
      v => !!v || "Required",
      v => /.+@.+\..+/.test(v) || "E-mail must be valid"
    ],

    show1: false,
    rules: {
      required: value => !!value || "Required.",
      min: v => (v && v.length >= 8) || "Min 8 characters",
      namelength: v => (v && v.length >= 3) || "Min 3 characters",
      tel: v => (v && v.length === 10) || "Telephone number not valid"
    },
    genderrules: {
      required: value => !!value || "Required.",
    },
    gender:['Male','Female'],
    brancharr:['Ambalangoda','Matara','Galle','Kuliyapitiya'],
    
        fromDateMenu: false,
        fromDateVal: null,
        minDate: "1960-07-04",
        maxDate: "2019-08-30",

})

}
</script>

