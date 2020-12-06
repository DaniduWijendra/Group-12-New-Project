<template>
    <v-row>
        <v-col >
    <v-card
    class="mx-3 mt-auto"
    style="height: 100px;"
    width="375"
  >
     
  <v-list style="height: 100px;">
    <v-alert
      text
      outlined
      color="deep-orange"
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
        Lorem Ipsum
      </h3>
      <div>50% discounts</div>

      <v-divider
        class="my-4 info"
        style="opacity: 0.22"
      ></v-divider>

      <v-row
        align="center"
        no-gutters
      >
        <v-col class="grow">
          asdfghjkjkkkll
        </v-col>
        <v-spacer></v-spacer>
        <v-col class="shrink">
          <v-btn
            color="info"
            outlined
          >
            Okay
          </v-btn>
        </v-col>
      </v-row>
    </v-alert>
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
                  prominent
                  type="error"
                  class="scrollable"
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
          { title: 'new event1'},
          { title: 'new event2'},
          { title: 'new event3'},
          //{ title: 'new event1'},
        ],

            }
    }
}
</script>