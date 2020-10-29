import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

export default new Router({
  mode: 'history',
  base: process.env.BASE_URL,
  routes: [
    {
      name: 'Home',
      path: '/',
      component: () => import('@/Home'),
    },
    {
      name: 'about',
      path: '/about',
      component: () => import('@/views/about'),
    },
    {
      name: 'contact',
      path: '/contact',
      component: () => import('@/views/contact'),
    },
    {
      name: 'services',
      path: '/services',
      component: () => import('@/views/service'),
    },
    {
      name: 'faq',
      path: '/faq',
      component: () => import('@/views/faq'),
    },

   //admin routes
   {
    path: '/admin',
    component: () => import('@/views/adminDashboard/Index'),
    children: [
      // Dashboard
      {
        name: 'Dashboard',
        path: '',
        component: () => import('@/views/adminDashboard/Dashboard'),
      },
      // Pages
      {
        name: 'User Profile',
        path: 'pages/user',
        component: () => import('@/views/adminDashboard/pages/UserProfile'),
      },
      {
        name: 'Notifications',
        path: 'components/notifications',
        component: () => import('@/views/adminDashboard/component/Notifications'),
      },
      {
        name: 'Icons',
        path: 'components/icons',
        component: () => import('@/views/adminDashboard/component/Icons'),
      },
      {
        name: 'Typography',
        path: 'components/typography',
        component: () => import('@/views/adminDashboard/component/Typography'),
      },
      // Tables
      {
        name: 'Regular Tables',
        path: 'tables/regular-tables',
        component: () => import('@/views/adminDashboard/tables/RegularTables'),
      },
      // Maps
      {
        name: 'Google Maps',
        path: 'maps/google-maps',
        component: () => import('@/views/adminDashboard/maps/GoogleMaps'),
      },
      // Upgrade
      {
        name: 'Upgrade',
        path: 'upgrade',
        component: () => import('@/views/adminDashboard/Upgrade'),
      },
    ],
  },


    
   
    //agent routes
    {
      path: '/agent',
      component: () => import('@/views/agentDashboard/Index'),
      children: [
        // Dashboard
        {
          name: 'Dashboard',
          path: '',
          component: () => import('@/views/agentDashboard/Dashboard'),
        },
        // Pages
        {
          name: 'User Profile',
          path: 'pages/user',
          component: () => import('@/views/agentDashboard/pages/UserProfile'),
        },
        {
          name: 'Notifications',
          path: 'components/notifications',
          component: () => import('@/views/agentDashboard/component/Notifications'),
        },
        {
          name: 'Icons',
          path: 'components/icons',
          component: () => import('@/views/agentDashboard/component/Icons'),
        },
        {
          name: 'Typography',
          path: 'components/typography',
          component: () => import('@/views/agentDashboard/component/Typography'),
        },
        // Tables
        {
          name: 'Regular Tables',
          path: 'tables/regular-tables',
          component: () => import('@/views/agentDashboard/tables/RegularTables'),
        },
        // Maps
        {
          name: 'Google Maps',
          path: 'maps/google-maps',
          component: () => import('@/views/agentDashboard/maps/GoogleMaps'),
        },
        //reports
        {
         name: 'reports',
         path: '/reports',
         component: () => import('@/views/agentDashboard/reports/reports'),
        },

          //messages
          {
            name: 'messages',
            path: '/messages',
            component: () => import('@/views/agentDashboard/Messages/messages'),
           },
             //uploads
          {
            name: 'uploads',
            path: '/uploads',
            component: () => import('@/views/agentDashboard/upload/upload'),
          },
            //payments
            {
              name: 'payments',
              path: '/payments',
              component: () => import('@/views/agentDashboard/payments/payments'),
            },
             //payments
             {
              name: 'driverHistory',
              path: '/driver_history',
              component: () => import('@/views/agentDashboard/driverHistory/driverHistory'),
            },
        // Upgrade
        {
          name: 'Upgrade',
          path: 'upgrade',
          component: () => import('@/views/agentDashboard/Upgrade'),
        },
      ],
    },

     //policyholder routes
   {
    path: '/policyholder',
    component: () => import('@/views/policyHolderDashboard/Index'),
    children: [
      // Dashboard
      {
        name: 'Dashboard',
        path: '',
        component: () => import('@/views/policyHolderDashboard/Dashboard'),
      },
      // Pages
      {
        name: 'User Profile',
        path: 'pages/user',
        component: () => import('@/views/policyHolderDashboard/pages/UserProfile'),
      },
      {
        name: 'Notifications',
        path: 'components/notifications',
        component: () => import('@/views/policyHolderDashboard/component/Notifications'),
      },
      {
        name: 'Icons',
        path: 'components/icons',
        component: () => import('@/views/policyHolderDashboard/component/Icons'),
      },
      {
        name: 'Typography',
        path: 'components/typography',
        component: () => import('@/views/policyHolderDashboard/component/Typography'),
      },
      // Tables
      {
        name: 'Regular Tables',
        path: 'tables/regular-tables',
        component: () => import('@/views/policyHolderDashboard/tables/RegularTables'),
      },
      // Maps
      {
        name: 'Google Maps',
        path: 'maps/google-maps',
        component: () => import('@/views/policyHolderDashboard/maps/GoogleMaps'),
      },

      
      // Upgrade
      {
        name: 'Upgrade',
        path: 'upgrade',
        component: () => import('@/views/policyHolderDashboard/Upgrade'),
      },
    ],
  },



    
   
  ],
})
