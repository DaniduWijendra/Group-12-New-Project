<template>
  <v-navigation-drawer
    id="core-navigation-drawer"
    v-model="drawer"
    :dark="barColor !== 'rgba(228, 226, 226, 1), rgba(255, 255, 255, 0.7)'"
    :expand-on-hover="expandOnHover"
    :right="$vuetify.rtl"
    color="blue lighten"
    mobile-breakpoint="960"
    app
    width="260"
    v-bind="$attrs"
  >
    <template v-slot:img="props">
      <v-img
        :gradient="`to bottom, ${barColor}`"
        v-bind="props"
      />
    </template>

    <!-- <v-divider class="mb-1" /> -->

    <v-list dense nav>
      <v-list-item class='mx-12'>
        <v-list-item-avatar
          class="align-self-center"
          color="white"
          contain
          size="100"
        >
          <v-avatar size="100">
            <v-img src='./man.png'></v-img>
        
          </v-avatar>
        </v-list-item-avatar>

      
      </v-list-item>
       <v-list-item link>
          <v-list-item-content>
            <v-list-item-title class="title" v-if='user'>
              {{user.firstName}} {{user.lastName}}
            </v-list-item-title>
            <v-list-item-subtitle><span v-if='user'>{{user.email}}</span></v-list-item-subtitle>
          </v-list-item-content>

          <v-list-item-action>
            <v-icon>mdi-menu-down</v-icon>
          </v-list-item-action>
        </v-list-item>
    </v-list>

    <v-divider class="mb-2" />

    <v-list expand nav>
      <!-- Style cascading bug  -->
      <!-- https://github.com/vuetifyjs/vuetify/pull/8574 -->
      <div/>

      <template v-for="(item, i) in computedItems">
        <base-item-group
          v-if="item.children"
          :key="`group-${i}`"
          :item="item"
        >
          <!--  -->
        </base-item-group>

        <base-item
          v-else
          :key="`item-${i}`"
          :item="item"
        />
      </template>

      <!-- Style cascading bug  -->
      <!-- https://github.com/vuetifyjs/vuetify/pull/8574 -->
      <div />
    </v-list>


  </v-navigation-drawer>
</template>

<script>
  // Utilities
  import {
    mapState,
  } from 'vuex'
  import User from '../../../log/api/user'
  export default {
    name: 'DashboardCoreDrawer',

    props: {
      expandOnHover: {
        type: Boolean,
        default: false,
      },
    },

    data: () => ({
      user:null,
      items: [
        {
          icon: 'mdi-view-dashboard',
          title: 'dashboard',
          to: '/superadmin',
        },
        {
          icon: 'mdi-account',
          title: 'user',
          to: '/superadmin/pages/user',
        },
        {
          icon: 'mdi-account-tie',
          title: 'Create an Admin',
          to: '/superadmin/admin_register',
        },
        {
          icon: 'mdi-face-agent',
          title: 'Create an Agent',
          to: '/superadmin/agent_register',
        },
        {
          icon: 'mdi-car-key',
          title: 'Policy Holder Information',
          to: '/superadmin/tables/policyholder-table',
        },
        {
          icon: 'mdi-face-agent',
          title: 'Agent Information',
          to: '/superadmin/tables/agent-table',
        },
        {
          icon: 'mdi-history',
          title: 'Driver History',
          to: '/superadmin/tables/driver-history',
        },
        {
          icon: 'mdi-email-plus',
          title: 'Reports',
          to: '/superadmin/reports',
        },
         {
          icon: 'mdi-email-edit',
          title: 'Reports Handle',
          to: '/superadmin/reportsHandle',
        },
        {
          title: 'Shops and Garages',
          icon: 'mdi-map-marker',
          to: '/superadmin/maps/shops-garages-map',
        },
        // {
        //   title: 'google',
        //   icon: 'mdi-map-marker',
        //   to: '/superadmin/maps/google-maps',
        // },
      ],
    }),

    computed: {
      ...mapState(['barColor']),
      drawer: {
        get () {
          return this.$store.state.drawer
        },
        set (val) {
          this.$store.commit('SET_DRAWER', val)
        },
      },
      computedItems () {
        return this.items.map(this.mapItem)
      },
      profile () {
        return {
          avatar: true,
          title: this.$t('avatar'),
        }
      },
    },

    methods: {
      mapItem (item) {
        return {
          ...item,
          children: item.children ? item.children.map(this.mapItem) : undefined,
          title: this.$t(item.title),
        }
      },
    },
    mounted(){
      User.auth().then(Response=>{
        this.user=Response.data;
        console.log(this.user);
      })
    }
  }
</script>

<style lang="sass">
  @import '~vuetify/src/styles/tools/_rtl.sass'

  #core-navigation-drawer
    .v-list-group__header.v-list-item--active:before
      opacity: .24

    .v-list-item
      &__icon--text,
      &__icon:first-child
        justify-content: center
        text-align: center
        width: 20px

        +ltr()
          margin-right: 24px
          margin-left: 12px !important

        +rtl()
          margin-left: 24px
          margin-right: 12px !important

    .v-list--dense
      .v-list-item
        &__icon--text,
        &__icon:first-child
          margin-top: 10px

    .v-list-group--sub-group
      .v-list-item
        +ltr()
          padding-left: 8px

        +rtl()
          padding-right: 8px

      .v-list-group__header
        +ltr()
          padding-right: 0

        +rtl()
          padding-right: 0

        .v-list-item__icon--text
          margin-top: 19px
          order: 0

        .v-list-group__header__prepend-icon
          order: 2

          +ltr()
            margin-right: 8px

          +rtl()
            margin-left: 8px
</style>
