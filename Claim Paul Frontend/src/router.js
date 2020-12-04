import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

const router= new Router({
  mode: 'history',
  base: process.env.BASE_URL,
  routes: [
    {
      name: 'Home',
      path: '/',
      component: () => import('@/Home'),
    },
    {
      name: 'login',
      path: '/login',
      component: () => import('@/views/log/login'),
      meta:{ guestOnly:true },
    },
    // {
    //   name: 'Admin Register',
    //   path: '/admin_register',
    //   component: () => import('@/views/log/admin_register'),
    //   meta:{ guestOnly:true },
    // },
    {
      name: 'policy holder register',
      path: '/policyholder_register',
      component: () => import('@/views/log/policyholder_register'),
      meta:{ guestOnly:true },
    },
    {
      name: 'Reset Password',
      path: '/reset_password',
      component: () => import('@/views/log/password_reset'),
    
    },
    {
      name: 'About',
      path: '/about',
      component: () => import('@/views/about'),
    },
    {
      name: 'Contact',
      path: '/contact',
      component: () => import('@/views/contact'),
    },
    {
      name: 'Services',
      path: '/services',
      component: () => import('@/views/service'),
    },
    {
      name: 'Garages',
      path: '/garages',
      component: () => import('@/views/Home/garages'),
    },
    {
      name: 'Shops',
      path: '/shops',
      component: () => import('@/views/Home/shops'),
    },
    {
      name: 'Spare Parts',
      path: '/spare_parts',
      component:() => import('@/views/Home/spareParts'),
      
    },
    {
      name: 'Faq',
      path: '/faq',
      component: () => import('@/views/faq'),
    },
    
    // {
    //   name: 'login',
    //   path: '/login',
    //   component: () => import('@/views/login'),
    // },
//superadmin routes
{
  path: '/superadmin',
  component: () => import('@/views/superadminDashboard/Index'),
  children: [
    // Dashboard
    {
      name: 'Super Admin Dashboard',
      path: '',
      component: () => import('@/views/superadminDashboard/Dashboard'),
    },
    // Pages
    {
      name: 'Super Admin User Profile',
      path: 'pages/user',
      component: () => import('@/views/superadminDashboard/pages/UserProfile'),
    },
    {
      name: 'Create an Admin',
      path: '/superadmin/admin_register',
      component: () => import('@/views/superadminDashboard/auth/admin_register'),
    },
    {
      name: 'Create an Agent',
      path: '/superadmin/agent_register',
      component: () => import('@/views/superadminDashboard/auth/agent_register'),
      meta:{ guestOnly:true },
    },
    {
      name: 'Super Admin Notifications',
      path: 'components/notifications',
      component: () => import('@/views/superadminDashboard/component/Notifications'),
    },
    {
      name: 'Policy Holder Managment',
      path: 'tables/policyholder-table',
      component: () => import('@/views/superadminDashboard/tables/policyholder-table'),
    },
    {
      name: 'Agent Managment',
      path: 'tables/agent-table',
      component: () => import('@/views/superadminDashboard/tables/agent-table'),
    },
    //driver history
    {
      name: 'Driver History Managment',
      path: 'tables/driver-history',
      component: () => import('@/views/superadminDashboard/tables/driver-history'),
    },
     //reports
     {
      name: 'Reports Managment',
      path: '/superadmin/reports',
      component: () => import('@/views/superadminDashboard/reports/reports'),
     },

      //reports handle
      {
       name: 'Reports Handle Managment',
       path: '/superadmin/reportsHandle',
       component: () => import('@/views/superadminDashboard/reports/reportsHandle'),
      },
      //garages and shops map
      {
        name: 'View nearBy Shops and Garages',
        path: '/superadmin/maps/shops-garages-map',
        component: () => import('@/views/superadminDashboard/maps/ShopsandGarages'),
       },

    // // Maps
    // {
    //   name: 'Admin Google Maps',
    //   path: 'maps/google-maps',
    //   component: () => import('@/views/superadminDashboard/maps/GoogleMaps'),
    // },
  ],
},
   //admin routes
   {
    path: '/admin',
    component: () => import('@/views/adminDashboard/Index'),
    children: [
      // Dashboard
      {
        name: 'Admin Dashboard',
        path: '',
        component: () => import('@/views/adminDashboard/Dashboard'),
      },
      // Pages
      {
        name: 'Admin User Profile',
        path: 'pages/user',
        component: () => import('@/views/adminDashboard/pages/UserProfile'),
      },
      // {
      //   name: 'Admin Register',
      //   path: '/admin/admin_register',
      //   component: () => import('@/views/adminDashboard/auth/admin_register'),
      // },
      {
        name: 'Agent Register',
        path: '/admin/agent_register',
        component: () => import('@/views/adminDashboard/auth/agent_register'),
        // meta:{ guestOnly:true },
      },
      {
        name: 'Admin Notifications',
        path: 'components/notifications',
        component: () => import('@/views/adminDashboard/component/Notifications'),
      },
      {
        name: 'Policy Holders Table',
        path: 'tables/policyholder-table',
        component: () => import('@/views/adminDashboard/tables/policyholder-table'),
      },
      {
        name: 'Agents Table',
        path: 'tables/agent-table',
        component: () => import('@/views/adminDashboard/tables/agent-table'),
      },
      //vehicle managment
      {
        name: 'Vehicle Managment',
        path: 'tables/vehicle-table',
        component: () => import('@/views/adminDashboard/tables/vehicle-table'),
      },
      //driver history
      {
        name: 'Driver History',
        path: 'tables/driver-history',
        component: () => import('@/views/adminDashboard/tables/driver-history'),
      },
       //reports
        {
        name: 'Admin Reports',
        path: '/admin/reports',
        component: () => import('@/views/adminDashboard/reports/reports'),
      },
      //reports handle
      {
        name: 'Admin Reports Handle',
        path: '/admin/reportsHandle',
        component: () => import('@/views/adminDashboard/reports/reportsHandle'),
      },
      //shop managment
      {
        name: 'Shop Managment',
        path: 'tables/shop-table',
        component: () => import('@/views/adminDashboard/tables/shops-table'),
      },
      //spare parts managment
      {
        name: 'Spare Parts Managment Managment',
        path: 'tables/spareParts-table',
        component: () => import('@/views/adminDashboard/tables/spareParts-table'),
      },
      //garage Managment
      {
        name: 'Garage Managment',
        path: 'tables/garage-table',
        component: () => import('@/views/adminDashboard/tables/garage-table'),
      },
      //garages and shops map
      {
        name: 'Shops and Garages',
        path: '/admin/maps/shops-garages-map',
        component: () => import('@/views/adminDashboard/maps/ShopsandGarages'),
      },

      // Maps
      // {
      //   name: 'Admin Google Maps',
      //   path: 'maps/google-maps',
      //   component: () => import('@/views/adminDashboard/maps/GoogleMaps'),
      // },
    ],
  },


    
   
    //agent routes
    {
      path: '/agent',
      component: () => import('@/views/agentDashboard/Index'),
      children: [
        // Dashboard
        {
          name: 'Agent Dashboard',
          path: '',
          component: () => import('@/views/agentDashboard/Dashboard'),
          meta:{authOnly:true},
        },
        // Pages
        {
          name: 'Agent User Profile',
          path: '/agent/user',
          component: () => import('@/views/agentDashboard/pages/UserProfile'),
        },
        {
          name: 'Agent Notifications',
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
          path: '/agent/maps/google-maps',
          component: () => import('@/views/agentDashboard/maps/GoogleMaps'),
        },
        //reports
        {
         name: 'Agent Reports',
         path: '/agent/reports',
         component: () => import('@/views/agentDashboard/reports/reports'),
        },

         //reports handle
         {
          name: 'Agent Reports Handle',
          path: '/agent/reportsHandle',
          component: () => import('@/views/agentDashboard/reports/reportsHandle'),
         },

         //reports handle
         {
          name: 'Test',
          path: '/agent/test',
          component: () => import('@/views/agentDashboard/reports/components/test'),
         },

          //messages
          {
            name: 'Agent messages',
            path: '/agent/messages',
            component: () => import('@/views/agentDashboard/Messages/messages'),
           },
             //uploads
          {
            name: 'uploads',
            path: '/agent/uploads',
            component: () => import('@/views/agentDashboard/upload/upload'),
          },
            //payments
            {
              name: 'Payments',
              path: '/agent/payments',
              component: () => import('@/views/agentDashboard/payments/payments'),
            },
             //payments
             {
              name: 'Agent Driver History',
              path: '/agent/driver_history',
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
        name: 'Policy Holder Dashboard',
        path: '',
        component: () => import('@/views/policyHolderDashboard/Dashboard'),
        //meta:{authOnly:true},
      },
      // Pages
      {
        name: 'Policy Holder User Profile',
        path: '/policyholder/user',
        component: () => import('@/views/policyHolderDashboard/pages/UserProfile'),
      },
      {
        name: 'Policy Holder Upload',
        path: '/policyholder/uploads',
        component: () => import('@/views/policyHolderDashboard/upload/upload'),
      },
      {
        name: 'View Driver History',
        path: '/policyHolder/driverHistory',
        component: () => import('@/views/policyHolderDashboard/driverHistory/driverHistory'),
      },
      {
        name: 'Find Shops',
        path: '/policyHolder/findShops',
        component: () => import('@/views/policyHolderDashboard/find/findShops'),
      },
      {
        name: 'Find Garages',
        path: '/policyHolder/findGarages',
        component: () => import('@/views/policyHolderDashboard/find/findGarages'),
      },
      // Tables
      {
        name: 'Generate Cost',
        path: '/policyHolder/generateCost',
        component: () => import('@/views/policyHolderDashboard/generateCost/generateCost'),
      },
      {
        name: 'Messages',
        path: '/policyHolder/messages',
        component: () => import('@/views/policyHolderDashboard/messages/messages'),
      },
      // Maps
      {
        name: 'Show Google Maps',
        path: '/policyholder/maps/google-maps',
        component: () => import('@/views/policyHolderDashboard/maps/GoogleMaps'),
      },

      
      // Upgrade
      // {
      //   name: 'Upgrade',
      //   path: 'upgrade',
      //   component: () => import('@/views/policyHolderDashboard/Upgrade'),
      // },
    ],
  },



    
   
  ],
})

function isLoggedIn(){
  return localStorage.getItem("token");
}

router.beforeEach((to, from, next) => {
  
  if (to.matched.some(record => record.meta.authOnly)) {
    // this route requires auth, check if logged in
    // if not, redirect to login page.
    if (!isLoggedIn()) {
      next({
        path: '/login',
        query: { redirect: to.fullPath }
      })
    } else {
      next()
    }
  } 

 else if (to.matched.some(record => record.meta.guestOnly)) {
    // this route requires auth, check if logged in
    // if not, redirect to login page.
    if (isLoggedIn()) {
      next({
        path: '/policyholder',
        query: { redirect: to.fullPath }
      })
    } else {
      next()
    }
  } 
  else {
    next() // make sure to always call next()!
  }
 

})


export default router;
