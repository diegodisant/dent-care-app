require('../bootstrap');

import Alpine from 'alpinejs';
import Vue from 'vue';
import UsersApp from '../../vue/views/users';
import LoadingScreen from '../../vue/components/LoadingScreen';

// Alpine bootstrap
window.Alpine = Alpine;

Alpine.start();

// Vue Components
Vue.component('app', UsersApp);
Vue.component('loading-screen', LoadingScreen);

const app = new Vue({
    el: '#app',
});
