<template>
    <div id="settings-wrapper">

    <v-card
      id="settings"
      class="py-2 px-4"
      color="green lighten-3"
      dark
      flat
      link
      min-width="100"
      style="position: fixed; top: 400px; right: -35px; border-radius: 8px;"
      
    >

    <router-link :to="{name:'Shops'}">
        <v-icon large>
         mdi-store-outline
       </v-icon>
    </router-link>
      
    </v-card>

    </div>
</template>

<script>
export default {

    name: 'wrapper',
    
}

</script>

<style lang="sass">
  .v-settings
    .v-item-group > *
      cursor: pointer

    &__item
      border-width: 3px
      border-style: solid
      border-color: transparent !important

      
</style>
