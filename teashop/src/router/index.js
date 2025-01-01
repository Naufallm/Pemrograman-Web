//import vue router
import { createRouter, createWebHistory } from 'vue-router'
//define a routes
const routes = [
  {
  path: '/',
  name: 'home',
  component: () => import( /* webpackChunkName: "home" */
  '../views/home.vue')
  },
  {
  path: '/menu',
  name: 'menu.index',
  component: () => import( /* webpackChunkName: "index" */
  '../views/menu/index.vue')
  },
  {
    path: '/testimoni',
    name: 'testimoni.index',
    component: () => import( /* webpackChunkName: "index" */
    '../views/testimoni/index.vue')
    },
  {
  path: '/create',
  name: 'menu.create',
  component: () => import( /* webpackChunkName: "create" */
  '../views/menu/create.vue')
  },
  {
    path: '/create',
    name: 'testimoni.create',
    component: () => import( /* webpackChunkName: "create" */
    '../views/testimoni/create.vue')
    },
  {
  path: '/edit/:id',
  name: 'menu.edit',
  component: () => import( /* webpackChunkName: "edit" */
  '../views/menu/edit.vue')
  },
  {
    path: '/edit/:id',
    name: 'testimoni.edit',
    component: () => import( /* webpackChunkName: "edit" */
    '../views/testimoni/edit.vue')
    }
  ]
  //create router
  const router = createRouter({
  history: createWebHistory(),
  routes // <-- routes,
  })
  export default router