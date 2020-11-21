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
    {
      name: 'Admin Register',
      path: '/admin_register',
      component: () => import('@/views/log/admin_register'),
      meta:{ guestOnly:true },
    },
    {
      name: 'Agent Register',
      path: '/agent_register',
      component: () => import('@/views/log/agent_register'),
      meta:{ guestOnly:true },
    },
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
      name: 'Faq',
      path: '/faq',
      component: () => import('@/views/faq'),
    },
    
    // {
    //   name: 'login',
    //   path: '/login',
    //   component: () => import('@/views/login'),
    // },

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
      {
        name: 'Admin Signup',
        path: 'pages/admin-signup',
        component: () => import('@/views/adminDashboard/pages/admin-signup'),
      },
      {
        name: 'Agent Signup',
        path: 'pages/agent-signup',
        component: () => import('@/views/adminDashboard/pages/agent-signup'),
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
        //garages and shops map
        {
          name: 'Shops and Garages',
          path: '/admin/maps/shops-garages-map',
          component: () => import('@/views/adminDashboard/maps/ShopsandGarages'),
         },

      // Maps
      {
        name: 'Admin Google Maps',
        path: 'maps/google-maps',
        component: () => import('@/views/adminDashboard/maps/GoogleMaps'),
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
        meta:{authOnly:true},
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
        path: 'maps/google-maps',
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
