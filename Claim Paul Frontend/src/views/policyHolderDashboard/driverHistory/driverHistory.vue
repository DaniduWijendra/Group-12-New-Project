<template>
  <v-container
    id="dashboard"
    fluid
    tag="section"
  >

      <v-card>
        <v-card-text>
          <div class="font-weight-bold ml-8 mb-2">
            Today
          </div>

          <v-timeline
            align-top
            dense
          >
            <v-timeline-item
              v-for="message in messages"
              :key="message.time"
              :color="message.color"
              small
            >
              <div>
                <div class="font-weight-normal">
                  <strong>{{ message.from }}</strong> @{{ message.time }}
                </div>
                <div>{{ message.message }}</div>
              </div>
            </v-timeline-item>
          </v-timeline>
        </v-card-text>
      </v-card>
  </v-container>
</template>

<script>
import Axios from '../../../baseURL'
export default {
    data: () => ({
      messages:[],
      
    }),

    methods:{

      getReport(){
        Axios.get('').then(Response=>{
          
        }).catch(error=>{
          console.log(error)
        });
      }
    },
  }
</script>