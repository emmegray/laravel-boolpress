import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

import HomeComp from "./components/HomeComp.vue";
import BlogComp from "./components/BlogComp.vue";
import AboutComp from "./components/AboutComp.vue";
import ContactsComp from "./components/ContactsComp.vue";


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
