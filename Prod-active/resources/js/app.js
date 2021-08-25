require('./bootstrap');
window.Vue = require('vue');

import App from './App.vue';
import Vue from 'vue';
import VueAxios from 'vue-axios';
import VueRouter from 'vue-router';
import axios from 'axios';
import { routes } from './routes';
import VueSimpleAlert from "vue-simple-alert";
window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.use(VueSimpleAlert);
var _ = require('lodash');

/**
 * Next, we will create a fresh Vue application instance and attach it to
@ -24,19 +26,6 @@ var _ = require('lodash');
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.use(require('vue-cookies'))
Vue.use(VueRouter);
Vue.use(VueAxios, axios);
 
const router = new VueRouter({
    mode: 'history',
    routes: routes
});
 
const app = new Vue({
    el: '#app',
    router: router,
    render: h => h(App),
});

Vue.component('login', require('./components/Login.vue').default);