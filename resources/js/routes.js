import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

import HomeComp from "./components/HomeComp.vue";
import BlogComp from "./components/BlogComp.vue";
import AboutComp from "./components/AboutComp.vue";
import ContactsComp from "./components/ContactsComp.vue";
import PostDetailComp from './components/PostDetailComp.vue';


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
            path: '/blog',
            name: 'blog',
            component: BlogComp
        },
        {
            path: '/about',
            name: 'about',
            component: AboutComp
        },
        {
            path: '/contacts',
            name: 'contacts',
            component: ContactsComp
        },
        {
            path: '/blog/:slug',
            name: 'detail',
            component: PostDetailComp
        }
    ]
})

export default router;
