import Vue from 'vue';
Vue.component('app-component',require('./App.vue').default);
const app = new Vue({
    el: '#app',
});
