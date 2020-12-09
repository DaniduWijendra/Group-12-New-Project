<template>
  <v-container id="dashboard" fluid tag="section">
    <v-row>
        <v-col cols="12" md="12">
          <base-material-card color="blue" class="px-5 py-auto ">
          <template v-slot:heading>
            <div class="display-3 font-weight-light">
              Welcome Admin
            </div>

            <div class="subtitle-1 font-weight-dark">
             You Last Visited on Today
            </div>
          </template>
            <v-row>
             <v-col cols="12" md="12" >
              <v-main class=' py-16 mx-3 px-0 pl-sm-5 blue accent-2'>
               <v-img pa-2
  src="../../assets/img/admin/adminImage.png" max-width="960" max-hight="250" 
></v-img>
                <!-- <textanimate/> -->
              </v-main>
              </v-col>
            </v-row>
          </base-material-card>
         </v-col>
         <v-col cols="12" sm="12" lg="12">
         <div class="display-2 font-weight-dark">
              User Managment
            </div>
         </v-col>
        <v-col cols="12" sm="6" lg="4">
          <base-material-stats-card
          color="info" icon="mdi-face-agent" title="Create an Agent"
          sub-icon="mdi-clock" sub-text="Newly Added" to='admin/agent_register'/>
        </v-col>

      <v-col cols="12" sm="6" lg="4">
        <base-material-stats-card
          color="primary"
          icon="mdi-car-key"
          title="Policy Holders"
          sub-icon="mdi-tag" sub-text="View Policy Holder Information" to="admin/tables/policyholder-table"/>
      </v-col>

      <v-col cols="12" m="6" lg="4">
        <base-material-stats-card
          color="orange"
          icon="mdi-history"
          title="Driver History"
          sub-icon="mdi-calendar"
          sub-text="View Previous Reports"
          to="admin/tables/driver-history"/>
      </v-col>

    <v-col cols="12" md="12">
        <base-material-card
      color="blue"
      icon="mdi-text-box-multiple-outline"
      title="Send Messages to Agents"
      class=" px-5 py-3"
      >

        
            <adminEmail/>
          
        
      </base-material-card>
      </v-col>

      <v-col cols="12" md="6">
        <base-material-card class="px-5 py-3">
          <template v-slot:heading>
            <v-tabs
              v-model="tabs"
              background-color="transparent"
              slider-color="white">
              <span
                class="subheading font-weight-light mx-3"
                style="align-self: center">Tasks:</span>
              <v-tab class="mr-3">
                <v-icon class="mr-2">
                  mdi-bug
                </v-icon>
                Bugs
              </v-tab>
              <v-tab class="mr-3">
                <v-icon class="mr-2">
                  mdi-code-tags
                </v-icon>
                Website
              </v-tab>
              <v-tab>
                <v-icon class="mr-2">
                  mdi-cloud
                </v-icon>
                Server
              </v-tab>
            </v-tabs>
          </template>

          <v-tabs-items
            v-model="tabs"
            class="transparent"
          >
            <v-tab-item
              v-for="n in 3"
              :key="n"
            >
              <v-card-text>
                <template v-for="(task, i) in tasks[tabs]">
                  <v-row :key="i" align="center">
                    <v-col cols="1">
                      <v-list-item-action>
                        <v-checkbox
                          v-model="task.value"
                          color="secondary"/>
                      </v-list-item-action>
                    </v-col>

                    <v-col cols="9">
                      <div class="font-weight-light" v-text="task.text"/>
                    </v-col>

                    <v-col cols="2" class="text-right">
                      <v-icon class="mx-1">
                        mdi-pencil
                      </v-icon>
                      <v-icon color="error" class="mx-1">
                        mdi-close
                      </v-icon>
                    </v-col>
                  </v-row>
                </template>
              </v-card-text>
            </v-tab-item>
          </v-tabs-items>
        </base-material-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
    import adminEmail from './component/adminEmail'
  // import textanimate from './component/animations/textanimate'
  export default {
    name: 'agent_dashboard',
    components:{adminEmail},
    data () {
      return {
        
        dataCompletedTasksChart: {
          data: {
            labels: ['12am', '3pm', '6pm', '9pm', '12pm', '3am', '6am', '9am'],
            series: [
              [230, 750, 450, 300, 280, 240, 200, 190],
            ],
          },
          options: {
            lineSmooth: this.$chartist.Interpolation.cardinal({
              tension: 0,
            }),
            low: 0,
            high: 1000, // creative tim: we recommend you to set the high sa the biggest value + something for a better look
            chartPadding: {
              top: 0,
              right: 0,
              bottom: 0,
              left: 0,
            },
          },
        },
        emailsSubscriptionChart: {
          data: {
            labels: ['Ja', 'Fe', 'Ma', 'Ap', 'Mai', 'Ju', 'Jul', 'Au', 'Se', 'Oc', 'No', 'De'],
            series: [
              [542, 443, 320, 780, 553, 453, 326, 434, 568, 610, 756, 895],

            ],
          },
          options: {
            axisX: {
              showGrid: false,
            },
            low: 0,
            high: 1000,
            chartPadding: {
              top: 0,
              right: 5,
              bottom: 0,
              left: 0,
            },
          },
          responsiveOptions: [
            ['screen and (max-width: 640px)', {
              seriesBarDistance: 5,
              axisX: {
                labelInterpolationFnc: function (value) {
                  return value[0]
                },
              },
            }],
          ],
        },
        headers: [
          {
            sortable: false,
            text: 'ID',
            value: 'id',
          },
          {
            sortable: false,
            text: 'Name',
            value: 'name',
          },
          {
            sortable: false,
            text: 'Salary',
            value: 'salary',
            align: 'right',
          },
          {
            sortable: false,
            text: 'Country',
            value: 'country',
            align: 'right',
          },
          {
            sortable: false,
            text: 'City',
            value: 'city',
            align: 'right',
          },
        ],
        items: [
          {
            id: 1,
            name: 'Dakota Rice',
            country: 'Niger',
            city: 'Oud-Tunrhout',
            salary: '$35,738',
          },
          {
            id: 2,
            name: 'Minerva Hooper',
            country: 'Curaçao',
            city: 'Sinaai-Waas',
            salary: '$23,738',
          },
          {
            id: 3,
            name: 'Sage Rodriguez',
            country: 'Netherlands',
            city: 'Overland Park',
            salary: '$56,142',
          },
          {
            id: 4,
            name: 'Philip Chanley',
            country: 'Korea, South',
            city: 'Gloucester',
            salary: '$38,735',
          },
          {
            id: 5,
            name: 'Doris Greene',
            country: 'Malawi',
            city: 'Feldkirchen in Kārnten',
            salary: '$63,542',
          },
        ],
        tabs: 0,
        tasks: {
          0: [
            {
              text: 'Sign contract for "What are conference organizers afraid of?"',
              value: true,
            },
            {
              text: 'Lines From Great Russian Literature? Or E-mails From My Boss?',
              value: false,
            },
            {
              text: 'Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit',
              value: false,
            },
            {
              text: 'Create 4 Invisible User Experiences you Never Knew About',
              value: true,
            },
          ],
          1: [
            {
              text: 'Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit',
              value: true,
            },
            {
              text: 'Sign contract for "What are conference organizers afraid of?"',
              value: false,
            },
          ],
          2: [
            {
              text: 'Lines From Great Russian Literature? Or E-mails From My Boss?',
              value: false,
            },
            {
              text: 'Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit',
              value: true,
            },
            {
              text: 'Sign contract for "What are conference organizers afraid of?"',
              value: true,
            },
          ],
        },
        list: {
          0: false,
          1: false,
          2: false,
        },
      }
    },

    methods: {
      complete (index) {
        this.list[index] = !this.list[index]
      },
    },
  }
</script>
<style>
  .dashboardImage
  {
    background-image: url(../../assets/img/admin/adminImage.png);
  }
</style>
