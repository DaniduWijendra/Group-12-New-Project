<template>
    <v-row>
        <v-col >
    <v-card
    class="mx-3 mt-auto"
    style="height: 100px;"
  >
     
  <v-list style="height: 100px;">
    <v-alert
      text
      outlined
      color="blue lighten-1"
      icon="mdi-fire"
    >
      Events
    </v-alert>
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~ -->
    <v-alert
      text
      color="info"
    >
      <h3 class="headline">
        Event List
      </h3>

      <v-divider
        class="my-4 info"
        style="opacity: 0.22"
      ></v-divider>

      <v-row
        align="center"
        no-gutters
      >
        <v-col class="grow">
          You Have New Events
        </v-col>
        <v-spacer></v-spacer>
        <v-col class="shrink">
          <v-btn
            color="info"
            outlined
            @click="alert = !alert"
          >
            Okay
          </v-btn>
        </v-col>
      </v-row>
    </v-alert>

    <v-alert
      :value="alert"
      type="info"
      dark
      border="top"
      icon="mdi-home"
      transition="scale-transition"
    >
      send all complete reports to agents 
    </v-alert>
  </div>
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <!-- ~~~~~~~~~~~~~~~~~list items ~~~~~~~~~~~~~~~~~~~~~~~ -->
        <v-list-item
          v-for="eve in eves"
          :key="eve.title"
          link
        >
          <v-list-item-icon>
            <v-icon>mdi-star</v-icon>
          </v-list-item-icon>

          <v-list-item-content>
               <v-alert
                icon="mdi-shield-lock-outline"
                prominent
                text
                type="info"
                >
                  {{eve.title}}
               </v-alert>
               

          </v-list-item-content>
        </v-list-item>
        <!-- ~~~~~~~~~~~~~~~~~~list items end~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
      </v-list>

      
  </v-card>
  </v-col>
    </v-row>
</template>

<script>
export default {
    data(){
            return{

        eves: [
          { title: 'urgent meeting schedule to agents on 2nd january'},
          { title: 'christmas vacations from 24 and 25 '},
    
          //{ title: 'new event1'},
        ],

         alert: false,

            }
    }
}
</script>