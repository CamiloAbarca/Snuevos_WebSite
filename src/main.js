import Vue from "vue";
import App from "./App.vue";
import router from "./router";
import AOS from 'aos'
import 'aos/dist/aos.css'

import { BootstrapVue, IconsPlugin } from "bootstrap-vue";
import "bootstrap/dist/css/bootstrap.css";
import "bootstrap-vue/dist/bootstrap-vue.css";

Vue.use(BootstrapVue);
Vue.use(IconsPlugin);

Vue.config.productionTip = false;

new Vue({
  router,
  render: (h) => h(App),
}).$mount("#app");

if (typeof window !== 'undefined') {
  AOS.init({ duration: 800, once: true })
}
