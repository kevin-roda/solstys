import { createRouter, createWebHistory } from 'vue-router'
let pageChanged = 0
const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'accueil',
      component: () => import('../views/homeView.vue')
    },
    {
      path: '/tourisme',
      name: 'tourisme',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/blackView.vue')
    },
    {
      path: '/formations',
      name: 'formations',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/whiteView.vue')
    }
  ]
})

router.beforeEach((to, from) => {
  pageChanged++
  if (to.name == 'accueil' && (from.name == 'formations' || from.name == 'tourisme')) {
    to.meta.transition = 'accueil-' + to.name
  } else {
    to.meta.transition = to.name
  }
  to.meta.pageChanged = pageChanged

  // const toDepth = to.path.split('/').length
  // const fromDepth = from.path.split('/').length
  // to.meta.transition = toDepth < fromDepth ? 'slide-right' : 'slide-left'
})

export default router
