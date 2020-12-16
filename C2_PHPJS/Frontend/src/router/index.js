import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import AuthLogin from '../views/Auth/Login.vue'
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
    path: '/login',
    name: 'auth.login',
    component: AuthLogin
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
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
