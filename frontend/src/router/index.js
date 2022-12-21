import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/cardapio',
    name: 'Cardapio',
    component: () => import(/* webpackChunkName: "cardapio" */ '../views/CardapioView.vue')
  },
  {
    path: '/promocoes',
    name: 'Promocoes',
    component: () => import(/* webpackChunkName: "promocoes" */ '../views/PromocoesView.vue')
  },
  {
    path: '/cadastro',
    name: 'Cadastro',
    component: () => import(/* webpackChunkName: "cadastrar" */ '../views/CadastroView.vue')
  },
  {
    path: '/entrar',
    name: 'Entrar',
    component: () => import(/* webpackChunkName: "login" */ '../views/EntrarView.vue')
  },
  {
    path: '/dashboard',
    name: 'DashboardView',
    component: () => import(/* webpackChunkName: "Painel Administrativo" */ '../views/DashboardView.vue')
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router