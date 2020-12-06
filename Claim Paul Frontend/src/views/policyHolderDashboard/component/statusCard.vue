<template>
    <v-row>
        <v-col
        cols="12"
        sm="8"
        lg="4"
        
      >
        <base-material-stats-card
          color="red"
          icon="mdi-store"
          title="Find Shops"
          value="+245"
          sub-icon="mdi-cart-arrow-up"
          sub-text="Just Updated"
          to='/policyholder/maps/google-maps'
        />
      </v-col>

      <v-col
        cols="12"
        sm="8"
        lg="4"
      >
        <base-material-stats-card
          color="success"
          icon="mdi-tools"
          title="Find Garages"
          value="+75"
          sub-icon="mdi-toolbox"
          sub-text="search nearest Garages"
          to='/policyholder/maps/google-maps'
        />
      </v-col>

      <v-col
        cols="12"
        sm="8"
        lg="4"
      >
        <base-material-stats-card
          color="info"
          icon="mdi-history"
          title="Search Driver History"
          value="+"
          sub-icon="mdi-calendar"
          sub-text="search driver history"
          to='/policyholder/driverHistory'
        />
      </v-col>
    </v-row>
</template>