<template>
    <v-form>
        <v-container>
            <v-row>
                <v-col cols="12" sm="8" md="8">
                     <v-text-field 
            label="Solo"
            v-model="search"
            placeholder="Enter Agent Name"
            solo  @keydown="nameKeydown($event)"
            >
            </v-text-field>
                </v-col>
                <v-col cols="12" sm="4" md="4">
                </v-col>
            </v-row>
            <base-material-card
      color="success"
      dark
      icon="mdi-clipboard-plus"
      title="Agents Table"
      class="px-5 py-3"
    >
    <b v-if="items.length">{{ idFilter.length }} Recods Found</b>
      <v-simple-table>
        <thead>
          <tr style="background-color:gray">
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Address</th>
            <th>Date of Birth</th>
            <th>Contact Number</th>
            <th>Email</th>
            <th>Branch</th>
            <!-- <th>Delete User</th> -->
          </tr>
        </thead>

        <tbody >
          <tr v-for="item in idFilter" :key="items.agId">
            <td>Ag__00{{item.agId}}</td>
            <td>{{item.fName}}</td>
            <td>{{item.lName}}</td>
            <td>{{item.agAddress}}</td>
            <td>{{item.agDob}}</td>
            <td>{{item.agContactNo}}</td>
            <td>{{item.email}}</td>
            <td>{{item.agBranch}}</td>
            <!-- <td><v-btn small 
              color="error" dark> Delete 
            </v-btn></td> -->
          </tr>
        </tbody>
      </v-simple-table>
    </base-material-card>
        </v-container>
    </v-form>
</template>
<script>
import Axios from 'axios'
export default {
    data: () => ({
     items:[],
     search:'', 
    }),
    created()
    {
      this.viewAgents();
    },
    computed:
    {
      idFilter(id)
      {
        return this.items.filter(item => {
          return item.fName.toLowerCase().includes(this.search.toLowerCase()) || item.lName.toLowerCase().includes(this.search.toLowerCase());
        })
      }
    },
    methods:{
       nameKeydown(e) {
      if (/^\W$/.test(e.key)) {
        e.preventDefault();
      }
    },
      
      viewAgents()
      {
        Axios.get('http://127.0.0.1:8000/api/agents').then(Response =>{
          this.items=Response.data;
        })
        .catch(function (error)
        {
          console.log('cannot get data'+ error);
        });
      }
    }
}
</script>