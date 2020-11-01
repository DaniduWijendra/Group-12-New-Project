<template>
    <v-form>
        <v-container>
            <v-row>
                <v-col cols="12" sm="8" md="8">
                     <v-text-field 
            label="Solo"
            placeholder="Enter NIC Number"
            solo >
            </v-text-field>
                </v-col>
                <v-col cols="12" sm="4" md="4">
                  <v-btn large
              color="success" dark >
              <v-icon large color="blue darken-2">mdi-magnify</v-icon>
              Search
            </v-btn>
                </v-col>
            </v-row>
        </v-container>
    </v-form>
</template>