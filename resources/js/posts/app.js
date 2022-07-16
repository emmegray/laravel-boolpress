import App from "../components/App";

window.axios = require('axios');
window.Vue = require('vue');

import Vue from 'vue';
Vue.component('app-component',require('../components/App.vue').default);
const app = new Vue({
    el: '#app',
    render: h => h("<app-component />")
});
