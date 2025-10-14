import Vue from "vue";
import Router from "vue-router";
import Home from "../views/Home.vue";
import Catalogo from "../views/Catalogo.vue";
import Nosotros from "../views/Nosotros.vue";

Vue.use(Router);

export default new Router({
  mode: "history",
  routes: [
    {
      path: "/",
      name: "Home",
      component: Home,
    },
    {
      path: "/nosotros",
      name: "Nosotros",
      component: Nosotros,
    },
    {
      path: "/catalogo",
      name: "Catalogo",
      component: Catalogo,
    },
  ],
});
