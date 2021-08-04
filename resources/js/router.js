import Vue from "vue";
import VueRouter from 'vue-router'

import Home from "./views/Home.vue";
import Jugadores from "./views/Jugadores.vue";
import Noticia from "./views/Noticia.vue";
import Calendario from "./views/Calendario.vue";
import Media from "./views/Media.vue";
import Noticias from "./views/Noticias.vue";

Vue.use(VueRouter)

const routes = [
  {
    path: "/",
    name: "Home",
    component: Home
  },
  {
    path: "/jugadores",
    name: "Jugadores",
    component: Jugadores
  },
  {
    path: "/calendario",
    name: "Calendario",
    component: Calendario
  },
  {
    path: "/clips",
    name: "Media",
    component: Media
  },
  {
    path: "/noticia/:id/:title",
    name: "Noticia",
    component: Noticia
  },
  {
    path: "/noticias",
    name: "Noticias",
    component: Noticias
  },
  {
    path: "*",
    name: "Home",
    component: Home
  },
];

const router = new VueRouter({
  mode: "history",
  routes
});

export default router;