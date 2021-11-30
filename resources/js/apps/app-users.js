require('../bootstrap');

import Alpine from 'alpinejs';
import Vue from 'vue';
import UsersApp from '../../vue/views/users';
import LoadingScreen from '../../vue/components/LoadingScreen';
import Paginator from '../../vue/components/Pagination';

// Alpine bootstrap
window.Alpine = Alpine;

Alpine.start();

// Vue Components
Vue.component('app', UsersApp);
Vue.component('loading-screen', LoadingScreen);
Vue.component('paginator', Paginator);

const app = new Vue({
    el: '#app',
});
