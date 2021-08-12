import Products from './components/Products.vue';
import CreateProduct from './components/CreateProduct.vue';
import EditProduct from './components/EditProduct.vue';
 
import Categories from './components/Categories.vue';
import CreateCategory from './components/CreateCategory.vue';
import EditCategory from './components/EditCategory.vue';
 
export const routes = [
    {
        name: 'home',
        path: '/',
        component: Products
    },
    {
        name: 'create',
        path: '/create',
        component: CreateProduct
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditProduct
    },
    {
        name: 'Categories',
        path: '/Categories',
        component: Categories
    },
    {
        name: 'createCategory',
        path: '/createCategory',
        component: CreateCategory
    },
    {
        name: 'editCategory',
        path: '/editCategory/:id',
        component: EditCategory
    }
];