import NovaSidebarMenu from 'nova-sidebar-menu'

Nova.booting((Vue, router, store) => {
  router.addRoutes([
    {
      name: 'master',
      path: '/master',
      component: require('./components/Tool'),
    },
  ])

    Vue.component('nova-sidebar', NovaSidebarMenu)
})
