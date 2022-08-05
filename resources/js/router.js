import Vue from 'vue';
import VueRouter from 'vue-router';

// COMPONENTS

import MainApp from './components/MainApp'
import UserHome from './components/UserHome'
import PackageEdit from './components/PackageEdit'
import NotFound from './components/NotFound'
import NavodPage from './components/NavodPage'
import StudyRoom from './studyroom/StudyRoom'
import MixApp from './studyroom/MixApp'
import PlanRoom from './planroom/PlanRoom'
import Dashboard from './dashboard/App'

// FOLDERS 

import MainFolders from './folders/MainFolders'
import SingleFolder from './folders/SingleFolder'

Vue.use(VueRouter) 

export default new VueRouter({
    mode: 'history',
    routes: [
        { path: '/404', component: NotFound},
        { path: '/package/:id', component: MainApp},
        { path: '/folder/:id', component: SingleFolder},
        { path: '/home', component: UserHome },
        { path: '/package/:id/edit', component: PackageEdit },
        { path: '/navod', component: NavodPage },
        { path: '/folders', component: MainFolders },
        { path: '/studyroom', component: StudyRoom },
        { path: '/scheduled', component: PlanRoom },
        { path: '/mixapp/:id', component: MixApp },
        { path: '/dashboard', component: Dashboard },
    ]
});