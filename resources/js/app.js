import App from './App.vue'
import MainApp from './components/MainApp'
import router from './router'
import UserHome from './components/UserHome'
import nav from './nav.js'
import 'animate.css'

require('./bootstrap');

window.Vue = require('vue');





const app = new Vue({
    router,

   render: h => h(App)
}).$mount('#app')
