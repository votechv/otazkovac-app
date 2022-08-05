import App from './App.vue'
import MainApp from './components/MainApp'
import router from './router'
import UserHome from './components/UserHome'
import nav from './nav.js'
import main from './main.js'
import 'animate.css'
import jquery from 'jquery'
import VueApexCharts from 'vue-apexcharts'
import moment from 'moment'

require('./bootstrap');
window.Vue = require('vue');

Vue.use(VueApexCharts)




Vue.component('apexchart', VueApexCharts)
const app = new Vue({
    router,

   render: h => h(App)
}).$mount('#app')
