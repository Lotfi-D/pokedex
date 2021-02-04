import Vue from 'vue'
import VueRouter from 'vue-router'
import Pokedex from '../views/Pokedex.vue'
import PokedexId from '../views/PokedexId.vue'
import Test from '../views/Test.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/test',
    name: 'Test',
    component: Test
  },
 
  {
    path: '/',
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
  mode: "history",
  routes
});

export default router
