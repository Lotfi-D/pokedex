import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import Pokedex from '../views/Pokedex.vue'
import PokedexId from '../views/PokedexId.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/pokedex',
    name: 'Pokedex',
    component: Pokedex
  },
  {
    path: '/pokedex/:id',
    name: 'PokedexId',
    component: PokedexId
  },

]

const router = new VueRouter({
  routes
})

export default router
