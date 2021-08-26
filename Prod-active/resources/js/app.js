require('./bootstrap');
window.Vue = require('vue');

import auth from './auth'
import App from './App.vue';
import Vue from 'vue';
import VueAxios from 'vue-axios';
import VueRouter from 'vue-router';
import axios from 'axios';
import { routes } from './routes';
import VueSimpleAlert from "vue-simple-alert";


window.Vue = require('vue').default;
Vue.use(VueSimpleAlert);
var _ = require('lodash');
Vue.use(require('vue-cookies'))
Vue.use(VueRouter);
Vue.use(VueAxios, axios);

const router = new VueRouter({
    mode: 'history',
    routes: routes
});

router.beforeEach((to, from, next) => {
    if (to.meta.auth && !auth.user.authenticated) {
        next('/login');
    } else if(!to.meta.auth && auth.user.authenticated) {
        next('/products');
    }else
        next();
})


const app = new Vue({
    el: '#app',
    router: router,
    render: h => h(App),
});

Vue.component('login', require('./components/Login.vue').default);