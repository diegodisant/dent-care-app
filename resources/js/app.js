require('./bootstrap');

// Deps
import Vue from 'vue';

// Components
import AppComponent from '../components/app';

Vue.component('app', AppComponent)

const app = new Vue({
    el: '#app',
    components: {}
});
