<template>
<div>

 <v-footer
    id="dashboard-core-footer"
     color="deep-purple darken-4"
  >
    <v-container>

      
      <v-row
        align="center"
        no-gutters
       
      >
      
        <v-col
         
          class="text-center mb-sm-0 mb-5"
          cols="auto"
        >
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

        <v-spacer class="hidden-sm-and-down" />

        <v-col
          cols="12"
          md="auto"
        >
          <div class="body-1 font-weight-light pt-6 pt-md-0 text-center white-text ">
            &copy; 2020
            <v-icon size="18" color="white">
              mdi-jellyfish-outline 
            </v-icon>
             ClaimPaul vehicle damage classification and cost prediction system
          </div>
        </v-col>
      </v-row>
    </v-container>
  </v-footer>

</div>
 
</template>

<script>
  export default {
    name: 'DashboardCoreFooter',

    data: () => ({
      icons: [
        'mdi-facebook',
        'mdi-twitter',
        'mdi-linkedin',
        'mdi-instagram',
      ],

  
    }),
  }
</script>

<style lang="sass">
  #dashboard-core-footer
    a
      font-size: .825rem
      font-weight: 500
      text-decoration: none
      text-transform: uppercase
</style>
