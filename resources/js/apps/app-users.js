require('../bootstrap');

import Alpine from 'alpinejs';
import Vue from 'vue';
import UsersApp from '../../vue/views/users';

// Alpine bootstrap
window.Alpine = Alpine;

Alpine.start();

// Vue Components
Vue.component('app', UsersApp);

const app = new Vue({
    el: '#app',
});
