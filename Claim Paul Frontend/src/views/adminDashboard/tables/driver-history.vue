<template>
    <v-form>
        <v-container>
            <v-row>
                <v-col cols="12" sm="8" md="8">
                     <v-text-field 
            label="Solo"
            @keyup.enter="searchit"
            placeholder="Enter NIC Number"
            solo v-model="driversearch" >
            </v-text-field>
                </v-col>
                <v-col cols="12" sm="4" md="4">
                  <v-btn large
              color="success" dark @click="searchit" >
              <v-icon large color="blue darken-2">mdi-magnify</v-icon>
              Search
            </v-btn>
                </v-col>
            </v-row>
            <base-material-card
      color="success"
      dark
      icon="mdi-clipboard-plus"
      title="Driver Table"
      class="px-5 py-3"
    >
      <v-simple-table>
        <thead>
          <tr>
            <th>NIC</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Address</th>
            <th>Date of Birth</th>
            <th>Contact Number</th>
            <th>Vehicle Number</th>
            <th>Reports</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>1</td>
            <td>Dakota Rice</td>
            <td>Niger</td>
            <td>Oud-Turnhout</td>
            <td>
              $36,738
            </td>
          </tr>

        </tbody>
      </v-simple-table>
    </base-material-card>
        </v-container>
    </v-form>
</template>
<script>
export default {
    data: () => ({
     driversearch:'',
    }),
    methods:{
        searchit()
        {
             
        }
    }
}
</script>