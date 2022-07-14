import Vue from 'vue';
Vue.component('app-component',require('../components/App.vue').default);
const app = new Vue({
    el: '#app',
});