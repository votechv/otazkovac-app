import Vue from 'vue';
import VueRouter from 'vue-router';

// COMPONENTS

import MainApp from './components/MainApp'
import UserHome from './components/UserHome'
import PackageEdit from './components/PackageEdit'

Vue.use(VueRouter) 

export default new VueRouter({
    mode: 'history',
    routes: [
        { path: '/package/:id', component: MainApp},
        { path: '/home', component: UserHome },
        { path: '/package/:id/edit', component: PackageEdit },
    ]
});