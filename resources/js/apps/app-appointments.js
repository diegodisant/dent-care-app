require('../bootstrap');

import Alpine from 'alpinejs';
import Vue from 'vue';
import AppointmentsApp from '../../vue/views/appointments';

// Alpine bootstrap
window.Alpine = Alpine;

Alpine.start();

// Vue Components
Vue.component('app', AppointmentsApp);

const app = new Vue({
    el: '#app',
});
