import Vue from 'vue'
import Router from 'vue-router'
import Home from './views/Home.vue'

Vue.use(Router)

export default new Router({
  mode: 'history',
  base: process.env.BASE_URL,
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home
    },
    {
      path: '/about',
      name: 'about',
      component: () => import('./views/About.vue')
    },
    {
      path: '/books/add',
      name: 'addBook',
      component: () => import('./views/AddBook.vue')
    },
    {
      path: '/books/:id',
      name: 'book',
      component: () => import('./views/Book.vue')
    },
    {
      path: '/books/:id/edit',
      name: 'editBook',
      component: () => import('./views/EditBook.vue')
    },
    {
      path: '/login',
      name: 'login',
      component: () => import('./views/Login.vue')
    },
    {
      path: '/protected',
      name: 'protected',
      component: () => import('./views/Protected.vue')
    },
    {
      path: '/category/add',
      name: 'addCategory',
      component: () => import('./views/AddCategory.vue')
    }
  ]
})
