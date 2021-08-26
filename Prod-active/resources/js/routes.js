import Products from './components/Products.vue';
import CreateProduct from './components/CreateProduct.vue';
import EditProduct from './components/EditProduct.vue';
 
import Categories from './components/Categories.vue';
import CreateCategory from './components/CreateCategory.vue';
import EditCategory from './components/EditCategory.vue';

import Login from './components/Login.vue';
import Register from './components/Register.vue';

export const routes = [
    {
        name: 'Login',
        path: '/',
        component: Login,
        meta:{ auth : false}

    },
    {
        name: 'Products',
        path: '/products',
        component: Products,
        meta:{ auth : true}
        
    },
    {
      path: '/register',
      name: 'Register',
      component: Register,
        meta:{ auth : false}
      
    },
    {
        path: '/login',
        name: 'Login',
        component: Login,
        meta:{ auth : false}
         
    },
    {
        name: 'create',
        path: '/create',
        component: CreateProduct,
        meta:{ auth : true}
        
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditProduct,
        meta:{ auth : true}
        
    },
    {
        name: 'Categories',
        path: '/Categories',
        component: Categories,
        meta:{ auth : true}
        
    },
    {
        name: 'createCategory',
        path: '/createCategory',
        component: CreateCategory,
        meta:{ auth : true}
        
    },
    {
        name: 'editCategory',
        path: '/editCategory/:id',
        component: EditCategory,
        meta:{ auth : true}
        
    }
];

