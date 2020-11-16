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
      name: 'register',
      path: '/register',
      component: () => import('@/views/log/register'),
      meta:{ guestOnly:true },
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
      {
        name: 'Cost Update Table',
        path: 'tables/cost-table',
        component: () => import('@/views/adminDashboard/tables/cost-table'),
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
        name: 'reports',
        path: '/admin/reports',
        component: () => import('@/views/adminDashboard/reports/reports'),
       },

        //reports handle
        {
         name: 'reports Handle',
         path: '/admin/reportsHandle',
         component: () => import('@/views/adminDashboard/reports/reportsHandle'),
        },
      // Maps
      {
        name: 'Google Maps',
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
          name: 'Dashboard',
          path: '',
          component: () => import('@/views/agentDashboard/Dashboard'),
          meta:{authOnly:true},
        },
        // Pages
        {
          name: 'User Profile',
          path: '/agent/user',
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
          path: '/agent/maps/google-maps',
          component: () => import('@/views/agentDashboard/maps/GoogleMaps'),
        },
        //reports
        {
         name: 'reports',
         path: '/agent/reports',
         component: () => import('@/views/agentDashboard/reports/reports'),
        },

         //reports handle
         {
          name: 'reports Handle',
          path: '/agent/reportsHandle',
          component: () => import('@/views/agentDashboard/reports/reportsHandle'),
         },

         //reports handle
         {
          name: 'reports Handle',
          path: '/agent/test',
          component: () => import('@/views/agentDashboard/reports/components/test'),
         },

          //messages
          {
            name: 'messages',
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
              name: 'payments',
              path: '/agent/payments',
              component: () => import('@/views/agentDashboard/payments/payments'),
            },
             //payments
             {
              name: 'driverHistory',
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

function isLoggedIn(){
  return localStorage.getItem("auth");
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
        path: '/agent',
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
