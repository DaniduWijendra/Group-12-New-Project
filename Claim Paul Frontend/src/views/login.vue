<template>
    <div class="d-flex justify-center mt-10">
        <v-app>
            <v-flex xs12 sm12 md12 lg12> 
                <v-card class="text-center ma-6" max-width="600" color="#3197b2">
                    <v-card-title class="justify-center">
                            <h2 style="color:#fff; font-size:3rem">Login Form</h2>
                             </v-card-title>
                              <v-card-text>
                                <v-form ref="loginForm" v-model="valid" lazy-validation>
                                    <v-row>
                                          <v-col cols="12" >
                                           <v-text-field prepend-icon="mdi-account-circle" v-model="loginUserName" :rules="[rules.required,rules.namelength]" label="User Name" maxlength="20" required></v-text-field>
                                        </v-col>
                                         <v-col cols="12">
                                            <v-text-field v-model="loginPassword" prepend-icon="mdi-lock" :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'" :rules="[rules.required, rules.min]" :type="show1 ? 'text' : 'password'" name="input-10-1" label="Password" hint="At least 8 characters" counter @click:append="show1 = !show1"></v-text-field>
                                        </v-col>
                                        <v-col class="d-flex" cols="12" sm="6" xsm="12">
                                        </v-col>
                                        <v-spacer></v-spacer>
                                        <v-col class="d-flex" cols="12" sm="3" xsm="12" align-end>
                                            <v-btn x-large block :disabled="!valid" color="success" @click="validate"> Login </v-btn>
                                        </v-col>
                                    </v-row>
                                </v-form>
                            </v-card-text>
                </v-card>
            </v-flex>
        </v-app>
    </div>
</template>

<script>
export default {
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
   
    valid: true,    
    loginPassword: "",
    loginUserName: "",
    show1: false,
    rules: {
      required: value => !!value || "Required.",
      namelength: v => (v && v.length >= 3) || "Min 3 characters",
      min: v => (v && v.length >= 8) || "Min 8 characters",
    },
})

}
</script>
