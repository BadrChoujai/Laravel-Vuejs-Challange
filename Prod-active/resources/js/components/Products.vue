<template>
    <div id="products">
    <div class="col-lg-9">
                <div class="row mt-4">
                    <div class="col-lg-4 col-md-6 mb-4" v-for="(product) in products" :key="product.product_id">
                        <div class="card h-100">
                            <a href="#">
                                <img class="card-img-top" src="http://placehold.it/700x400" alt="image">
                            </a>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="#">{{ product.name }}</a>
                                </h4>
                               
                                <h6>$ {{ product.price }}</h6>
                                <p class="card-text">{{ product.description }}</p>
                                 <div class="btn-group" role="group">
                                    <router-link :to="{name: 'edit', params: { id: product.product_id }}" id="edit" class="btn btn-success">Edit</router-link>
                                    <button class="btn btn-danger" @click="deleteProduct(product.product_id)">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</template>
<script>
export default ({
    name:'Products',
    data: function () {
            return {
                categories: [],
                products: [],
            }
        },

        mounted() {
            // this.loadCategories();
            this.loadProducts();
        },

        methods: {
            loadProducts: function () {
                    this.axios.get('/api/products')
                    .then((response) => {
                        this.products = response.data;
                        console.log(this.products);
                    })
                    .catch(function (error) {
                        console.log(error);
                    })
            },
            deleteProduct(id){
                this.axios
                    .delete(`/api/products/${id}`)
                    .then(response => {
                        let i = this.products.map(data => data.product_id).indexOf(id);
                        this.products.splice(i, 1)
                    });
            }

        }
})
</script>
<style scoped>
#edit{
    margin-right: 10px;
}
</style>