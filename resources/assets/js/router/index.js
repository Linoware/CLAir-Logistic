import Vue from 'vue'
import Router from 'vue-router'

import VueResource from 'vue-resource'
import Meta from 'vue-meta'

import loginRoutes from './login'
import pagenotfound from './pagenotfound'
import dashboardsRoutes from './dashboards'
import layoutsRoutes from './layouts'
import tables from './tables'
import userRoutes from './users'
import components from './components'
import { routerHistory, writeHistory } from 'vue-router-back-button'

Vue.use(Router)
Vue.use(Meta)
Vue.use(VueResource)
Vue.use(routerHistory)
let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    
    console.log(token)
    
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}
const ROUTES = [
  // Default route
  { 
    path: '', 
    redirect: '/dashboards/dashboard-1',
    meta:{
      requiresAuth: true
    }
  }
]
  .concat(loginRoutes)
  .concat(dashboardsRoutes)
  .concat(layoutsRoutes)
  .concat(tables)
  .concat(userRoutes)
  .concat(components)
  .concat(pagenotfound)

const router = new Router({
  base: '/',
  mode: 'history',
  routes: ROUTES,
  meta: {
    requiresAuth: true
  }
})

router.afterEach(writeHistory)

router.afterEach(() => {
  // Remove initial splash screen
  const splashScreen = document.querySelector('.app-splash-screen')
  if (splashScreen) {
    splashScreen.style.opacity = 0
    setTimeout(() => splashScreen && splashScreen.parentNode.removeChild(splashScreen), 300)
  }

  // On small screens collapse sidenav
  if (window.layoutHelpers && window.layoutHelpers.isSmallScreen() && !window.layoutHelpers.isCollapsed()) {
    setTimeout(() => window.layoutHelpers.setCollapsed(true, true), 10)
  }
})

router.beforeEach((to, from, next) => {
  // Set loading state
  document.body.classList.add('app-loading')

  // Add tiny timeout to finish page transition
  setTimeout(() => next(), 10)
})

export default router
