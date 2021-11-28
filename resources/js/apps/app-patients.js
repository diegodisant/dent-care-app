require('../bootstrap');

import Alpine from 'alpinejs';
import Vue from 'vue';
import PatientsApp from '../../vue/views/patients';

// Alpine bootstrap
window.Alpine = Alpine;

Alpine.start();

// Vue Components
Vue.component('app', PatientsApp);

const app = new Vue({
    el: '#app',
});
