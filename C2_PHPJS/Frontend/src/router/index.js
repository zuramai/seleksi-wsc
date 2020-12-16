import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import EventShow from '../views/Event/Show.vue'
import EventRegister from '../views/Event/Register.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/organizers/:organizerSlug/events/:eventSlug',
    name: 'event.show',
    component: EventShow
  },
  {
    path: '/organizers/:organizerSlug/events/:eventSlug/register',
    name: 'event.register',
    component: EventRegister
  },
  {
    path: '/about',
    name: 'About',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/About.vue')
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
