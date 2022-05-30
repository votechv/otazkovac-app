import Vue from 'vue';
import VueRouter from 'vue-router';

// COMPONENTS

import MainApp from './components/MainApp'
import UserHome from './components/UserHome'
import PackageEdit from './components/PackageEdit'
import NotFound from './components/NotFound'
import NavodPage from './components/NavodPage'

Vue.use(VueRouter) 

export default new VueRouter({
    mode: 'history',
    routes: [
        { path: '/404', component: NotFound},
        { path: '/package/:id', component: MainApp},
        { path: '/home', component: UserHome },
        { path: '/package/:id/edit', component: PackageEdit },
        { path: '/navod', component: NavodPage },
    ]
});