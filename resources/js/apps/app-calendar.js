require('../bootstrap');

import Alpine from 'alpinejs';
import Vue from 'vue';
import CalendarApp from '../../vue/views/calendar';

// Alpine bootstrap
window.Alpine = Alpine;

Alpine.start();

// Vue Components
Vue.component('app', CalendarApp);

const app = new Vue({
    el: '#app',
});
