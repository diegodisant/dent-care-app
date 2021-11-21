require('./bootstrap');

import Alpine from 'alpinejs';
import Vue from 'vue';
import AppComponent from '../components/app';

// Alpine bootstrap
window.Alpine = Alpine;

Alpine.start();

// Vue Components
Vue.component('app', AppComponent);

const app = new Vue({
    el: '#app',
    components: {},
});
