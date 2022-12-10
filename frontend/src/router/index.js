import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/cardapioo',
    name: 'Cardapio',
    component: () => import(/* webpackChunkName: "cardapio" */ '../views/CardapioView.vue')
  },
  {
    path: '/promocoes',
    name: 'Promocoes',
    component: () => import(/* webpackChunkName: "promocoes" */ '../views/PromocoesView.vue')
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router