import App from './App.vue'
import MainApp from './components/MainApp'
import router from './router'
import nav from './nav.js'
import Offline from './offline.js'
import 'animate.css'
import jquery from 'jquery'
import VueApexCharts from 'vue-apexcharts'
import moment from 'moment'
import Public from './public/App.vue'
import Hero from './public/hero.js'
import Navigation from './public/navigation.js'


require('./bootstrap');
window.Vue = require('vue');

Vue.use(VueApexCharts)

window.addEventListener("load", function () {
    new Offline();
    new Hero();
    new Navigation();
  });

Vue.component('apexchart', VueApexCharts);




if (document.getElementById("app")) {
  const app = new Vue({
      router,
  
     render: h => h(App)
  }).$mount('#app')
}
if (document.getElementById("offline-app")) {
  const app2 = new Vue({
    router,
     render: a => a(Public)
  }).$mount('#offline-app')
}



