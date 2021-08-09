require('./bootstrap');
window.Vue = require('vue');

import App from './App.vue';
import axios from 'axios'; 
import Vue from 'vue';
import Products from './components/Products.vue'
import Categories from './components/Categories.vue'

import VueRouter from 'vue-router'

Vue.use(axios);
Vue.use(VueRouter);

const routes = [
    {
        name:'/products',
        component: Products,
        path:'/products'
    },
    {
        name: '/Categories',
        component: Categories,
        path: '/Categories'
    }
]
const router = new VueRouter({routes: routes});
const app = new Vue(Vue.util.extend({router}, App)).$mount('#app');