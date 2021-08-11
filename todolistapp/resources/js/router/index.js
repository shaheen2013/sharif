import Vue from 'vue'
import VueRouter from 'vue-router'
import mainview from '../Master.vue'
import LoginView from '../pages/Auth/Login.vue'
import RegisterView from '../pages/Auth/Register.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Home',
    component: mainview
  },
  {
    path: '/login',
    name: 'Login',
    component: LoginView
  },
  {
      path: '/register',
      name: 'Register',
      component: RegisterView
  }

]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
