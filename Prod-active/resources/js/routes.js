import Products from './components/Products.vue';
import CreateProduct from './components/CreateProduct.vue';
import EditProduct from './components/EditProduct.vue';
 
import Categories from './components/Categories.vue';
import CreateCategory from './components/CreateCategory.vue';
import EditCategory from './components/EditCategory.vue';

import Login from './components/Login.vue';
import Register from './components/Register.vue';

import auth from "./auth";
export const routes = [
    {
        name: 'Login',
        path: '/',
        component: Login
    },
    {
        name: 'Products',
        path: '/products',
        component: Products,
        meta: {
            requiresAuth: true
        },
        beforeEach:(to, from, next) => {
            if (auth.user.authenticated === false) {
                next(false);
            }else
                next();
        }
    },
    {
      path: '/register',
      name: 'Register',
      component: Register,
      beforeEach:(to, from, next) => {
            if (to.name != 'Login') {
                next('/login');
            }else
                next(to.name);
        }
    },
    {
      path: '/login',
      name: 'Login',
      component: Login,
      beforeEach:(to, from, next) => {
            if (to.name != 'Login') {
                next('/login');
            }else
                next(to.name);
        }
    },
    {
        name: 'create',
        path: '/create',
        component: CreateProduct,
        beforeEach:(to, from, next) => {
            if (auth.user.authenticated == false) {
                next(false);
            }else
                next();
        }
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditProduct,
        beforeEach:(to, from, next) => {
            if (auth.user.authenticated == false) {
                next(false);
            }else
                next();
        }
    },
    {
        name: 'Categories',
        path: '/Categories',
        component: Categories,
        beforeEach:(to, from, next) => {
            if (auth.user.authenticated == false) {
                next(false);
            }else
                next();
        }
    },
    {
        name: 'createCategory',
        path: '/createCategory',
        component: CreateCategory,
        beforeEach:(to, from, next) => {
            if (auth.user.authenticated == false) {
                next(false);
            }else
                next();
        }
    },
    {
        name: 'editCategory',
        path: '/editCategory/:id',
        component: EditCategory,
        beforeEach:(to, from, next) => {
            if (auth.user.authenticated == false) {
                next(false);
            }else
                next();
        }
    }
];