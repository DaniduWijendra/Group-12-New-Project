<template>
   <v-card class="mb-0 px-6 cyan lighten-3">
    <v-row>
      <v-col cols="12" sm="4" >
        
          <v-main
            class="mx-auto"
            color="white"
            dark
            style="max-width: 300px;"
          >
            <v-row >
             
              <v-img
                class="my-12"
                contain
                src="../../assets/img/home/logo.png"
          
              ></v-img>

              <div class=" ht offset-1">ClaimPaul</div>
            </v-row>
           
            
          </v-main>

          
          
          
      </v-col>
      <v-col cols="12" sm="8">

        <v-row>
          <v-col cols="12" sm="12" class="cyan accent-2">
            <v-container class="d-flex cyan accent-2 mx-3">
              <v-col cols="12" sm="4"><v-btn fab class="cyan"><v-icon large >mdi-phone</v-icon></v-btn><span>call us:(+94774444444)(week days)</span></v-col>
              <v-col cols="12" sm="4" ><v-btn fab class="cyan"><v-icon large  >mdi-message</v-icon></v-btn><span>Mai us for any help:claimpaul1@gmail.com</span></v-col>
              <v-col cols="12" sm="4" ><v-btn fab class="cyan"><v-icon large >mdi-clock</v-icon></v-btn><span>Opening time:Mon-Fri:8a.m-7p.m</span></v-col>
            </v-container>
          </v-col>
          <v-col cols="12" sm="4" class="my-3">
            <h4>Newletter</h4>
            <p>Subscribe our newsletter to get our latest update & news</p>
            <v-form>
                <v-container>
                  <v-row>
                    <v-col cols="12">
                      <v-text-field
                        v-model="message"
                        outlined
                        clearable
                        label="Enter Your Email Address"
                        type="text"
                      >
                        <template v-slot:prepend>
                          <v-tooltip
                            bottom
                          >
                            <template v-slot:activator="{ on }">
                              <v-icon v-on="on">
                                mdi-help-circle-outline
                              </v-icon>
                            </template>
                            Get Help
                          </v-tooltip>
                        </template>
                        <template v-slot:append >
                          
                           
                            <v-btn class="mb-6 blue">
                               <v-progress-circular
                              v-if="loading"
                              size="24"
                              color="info"
                              indeterminate
                            ></v-progress-circular>
                            <img
                              v-else
                              width="24"
                              height="24"
                              src="https://api.iconify.design/grommet-icons:send.svg?height=24"
                              alt=""
                             
                            >
                            </v-btn>

                            
                          
                            
                            
                         
                        </template>
        
                        </v-text-field>

                        
                      </v-col>
                    </v-row>
                  </v-container>
                </v-form>

                <v-btn
                              v-for="icon in icons"
                              :key="icon"
                              class="mx-4"
                              dark
                              icon
                              
                            >
                              <v-icon size="24px" color="white">
                                {{ icon }}
                              </v-icon>
                            </v-btn>

          </v-col>
          <v-col cols="12" sm="4" class="my-3 ">
            <h4>Official Info</h4>
            <v-col class="d-flex my-3">
              <v-icon color="blue" >mdi-map-marker</v-icon>
              <span class="offset-1">30 Commercial Road,<br> colombo</span>

            </v-col>

             <v-col class="d-flex my-3">
              <v-icon color="blue">mdi-phone</v-icon>
              <span class="offset-1">1-888-452-1505</span>

            </v-col>

              <v-col class="d-flex my-3">
              
              <span>Mon – Fri: 8 am – 5 pm, Saturday and Sunday: CLOSED</span>

            </v-col>

          </v-col>
          <v-col cols="12" sm="4" class="my-3">

            <v-col
            v-for="n in 6"
            :key="n"
            class="d-flex child-flex"
            cols="4"
          >
            <v-img
              :src="`https://picsum.photos/500/300?image=${n * 5 + 10}`"
              :lazy-src="`https://picsum.photos/10/6?image=${n * 5 + 10}`"
              aspect-ratio="1"
              class="grey lighten-2"
            >
              <template v-slot:placeholder>
                <v-row
                  class="fill-height ma-0"
                  align="center"
                  justify="center"
                >
                  <v-progress-circular
                    indeterminate
                    color="grey lighten-5"
                  ></v-progress-circular>
                </v-row>
              </template>
            </v-img>
          </v-col>
          </v-col>
        </v-row>
      </v-col>

      <v-col>

        <div class="text-center">
    <v-bottom-sheet v-model="sheet">
      <template v-slot:activator="{ on, attrs }">
        <v-btn
          color="purple"
          dark
          v-bind="attrs"
          v-on="on"
        >
          Open In
        </v-btn>
      </template>
      <v-list>
        <v-subheader>Open in</v-subheader>
        <v-list-item
          v-for="tile in tiles"
          :key="tile.title"
          @click="sheet = false"
        >
          <v-list-item-avatar>
            <v-avatar
              size="32px"
              tile
            >
              <img
                :src="`https://cdn.vuetifyjs.com/images/bottom-sheets/${tile.img}`"
                :alt="tile.title"
              >
            </v-avatar>
          </v-list-item-avatar>
          <v-list-item-title>{{ tile.title }}</v-list-item-title>
        </v-list-item>
      </v-list>
    </v-bottom-sheet>
  </div>
      </v-col>
      
    </v-row>
  </v-card>
</template>

<script>
  export default {
    

    data: () => ({
      icons: [
        'mdi-facebook',
        'mdi-twitter',
        'mdi-linkedin',
        'mdi-instagram',
      ],
      sheet: false,
      tiles: [
        { img: 'keep.png', title: 'Keep' },
        { img: 'inbox.png', title: 'Inbox' },
        { img: 'hangouts.png', title: 'Hangouts' },
        { img: 'messenger.png', title: 'Messenger' },
        { img: 'google.png', title: 'Google+' },
      ],
  
    }),
  }
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Archivo+Narrow&family=Lobster&family=Righteous&family=Staatliches&display=swap');
.ht{

  font-family: 'Archivo Narrow', sans-serif;
font-family: 'Lobster', cursive;
font-family: 'Righteous', cursive;
font-family: 'Staatliches', cursive;

font-size:6rem;

}
</style>