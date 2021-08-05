import Vue from 'vue'
import VueRouter from "vue-router"

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'home',
    components: {
      default: () => import(/* webpackChunkName: "home" */ '../views/Home.vue'),
    }
  },
  {
    path: '/creer-mon-entreprise',
    name: 'create-company',
    components: {
      default: () => import(/* webpackChunkName: "create-company" */ '../views/CreateCompany.vue')
    }
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes,
  scrollBehavior(to) {
    if(to.hash) {
      return {
        selector: to.hash,
        behavior: 'smooth'
      }
    }
  }
})

// router.beforeEach((to, from, next) => {
  // const requiresAuth = to.matched.some(record => record.meta.requiresAuth)
  // const isAuthenticated = firebase.auth().currentUser
  // if (requiresAuth && !isAuthenticated) {
  //   next('/login')
  // } else {
  //   next()
  // }
// })

export default router;
