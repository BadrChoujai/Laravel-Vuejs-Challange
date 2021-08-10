<template>
    <div id="products">
        <!-- <div class="container" :class="{'loading': loading}">
        <div class="row">
            <div class="col-lg-3">
                <h1 class="my-4">Shop Catalog</h1>
                <div class="list-group">
                    <a class="list-group-item" v-for="category in categories" :key="category">
                        {{ category.name }}
                    </a>
                </div>
            </div>
        </div>
    </div> -->
    <div class="container" v-if="loading">
        <h1>LOADING</h1>
    </div>
    <div class="col-lg-9" v-else>
                <div class="row mt-4">
                    <div class="col-lg-4 col-md-6 mb-4" v-for="(product, Index) in products" v-bind:key="Index">
                        <div class="card h-100">
                            <a href="#">
                                <img class="card-img-top" src="http://placehold.it/700x400" alt="image">
                            </a>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="#">{{ product.name }}</a>
                                </h4>
                                <h5>$ {{ product.price }}</h5>
                                <p class="card-text">{{ product.description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</template>
<script>
import axios from "axios";
export default ({
    name:'Products',
    data: function () {
            return {
                categories: [],
                products: [],
                // url:document.head.querySelector('meta[name="url"]').content,
                loading: false
            }
        },

        mounted() {
            // this.loadCategories();
            this.loadProducts();
        },

        methods: {
//             loadCategories: function () {
//                 let url = this.url + '/api/getcategories'
//                 axios.get(url)
//                     .then((response) => {
//                         this.categories = response.data.data;
//                     })
//                     .catch(function (error) {
//                         console.log(error);
//                     });
//             },
            loadProducts: function () {
                    return axios.get('/api/products')
                    .then((response) => {
                        this.products = response.data.data;
                    })
                    .catch(function (error) {
                        this.loading = false;
                        console.log(error);
                    })
                    .finally(function () {
                        this.loading = false;
                    })
            }
        }
})
</script>
