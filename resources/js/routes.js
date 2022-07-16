import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

import HomeComp from "./components/HomeComp";
import BlogComp from "./components/BlogComp";
import AboutComp from "./components/AboutComp";
import ContactsComp from "./components/ContactsComp";


const router = new VueRouter({
    mode: 'history',
    linkExactActiveClass: 'active',
    routes:[
        {
            path:'/',
            name: 'home',
            component: HomeComp
        },
        {
            path: '/',
            name: 'blog',
            component: BlogComp
        },
        {
            path: '/',
            name: 'about',
            component: AboutComp
        },
        {
            path: '/',
            name: 'contacts',
            component: ContactsComp
        },
    ]
})

export default router;
