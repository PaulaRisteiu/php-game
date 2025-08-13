import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import BattleField from '@/components/BattleField.vue'
// import HeroStatus from '@/components/HeroStatus.vue'
// import MonsterStatus from '@/components/MonsterStatus.vue'
import Monster from '@/views/Monster.vue'
import Hero from '@/views/Hero.vue'
import Battle from '@/views/Battle.vue'



const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'Home',
      component: HomeView,
    },
    {
      path: '/hero',
      name: 'Hero',

      component: Hero,
    },
    {
      path: '/monster',
      name: 'Monster',

      component: Monster,
    },


    {
      path: '/battle-field',
      name: 'Battle',
      component: Battle
    },
    {
      // fallback pentru rute necunoscute
      path: '/:catchAll(.*)',
      redirect: '/',
    },
    ]
})

export default router

