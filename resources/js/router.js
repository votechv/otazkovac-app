import Vue from 'vue';
import VueRouter from 'vue-router';

// COMPONENTS

import MainApp from './components/MainApp'
import UserHome from './components/UserHome'
import PackageEdit from './components/PackageEdit'
import NotFound from './components/NotFound'
import NavodPage from './components/NavodPage'
import MixApp from './studyroom/MixApp'
import PlanRoom from './planroom/PlanRoom'
import Dashboard from './dashboard/App'

// FOLDERS 

import MainFolders from './folders/MainFolders'
import SingleFolder from './folders/SingleFolder'
import FoldersEdit from './folders/FoldersEdit'
import SingleFolderEdit from './folders/SingleFolderEdit'


//CHECKLIST
import Checklist from './checklist/App'

import Setting from './components/Setting.vue'

Vue.use(VueRouter) 

export default new VueRouter({
    mode: 'history',
    routes: [
        { path: '/404', component: NotFound},
        { path: '/package/:id', component: MainApp},
        { path: '/folder/:id', component: SingleFolder},
        { path: '/home', component: UserHome },
        { path: '/package/:id/edit', component: PackageEdit },
        { path: '/folder/:id/edit', component: SingleFolderEdit },
        { path: '/navod', component: NavodPage },
        { path: '/folders', component: MainFolders },
        { path: '/scheduled', component: PlanRoom },
        { path: '/mixapp/:id', component: MixApp },
        { path: '/dashboard', component: Dashboard },
        { path: '/edit-folders', component: FoldersEdit },
        { path: '/setting', component: Setting },
        { path: '/checklist', component: Checklist },
    ]
});