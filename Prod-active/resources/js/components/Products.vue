<template>
    <div id="products">
    <div class="col-lg-9">
                <div v-show="isLoading" class="wrapper">
                    <div class="card-loader card-loader--tabs"></div>
                </div>
                <div class="row mt-4">
                    <div  class="col-lg-4 col-md-6 mb-4" v-for="(product) in products" :key="product.product_id">
                        <div class="card h-100">
                            <img class="card-img-top" id="card" :src="'/public/img/' + product.image"  :alt="product.image">
                            <div class="card-body">
                                <h4 class="card-title">
                                    {{ product.name }}
                                </h4>
                                <h6>Price : $ {{ product.price }}</h6>
                                <h6>Category : {{ product.category_id }}</h6>
                                <p class="card-text">Description : {{ product.description }}</p>
                                 <div class="btn-group" role="group">
                                    <router-link :to="{name: 'edit', params: { id: product.product_id }}" id="edit" class="btn btn-outline-success">Edit</router-link>
                                    <button class="btn btn-outline-danger" @click="deleteProduct(product.product_id)">Delete</button>
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
                products: [],
                isLoading:false,
            }
    },

        mounted() {
            this.loadProducts();
        },
        computed:{
            
        },
        methods: {
            loadProducts: function () {
                    this.isLoading = true;
                    this.axios.get('/api/products')
                    .then((response) => {
                        this.products = response.data;
                        if(this.products.length != 0){
                            this.isLoading = false;
                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                    })
            },
            deleteProduct(id){
                this.$confirm(`Are you sure?`, 'Delete', 'error').then(() => {
                    this.axios
                    .delete(`/api/products/${id}`)
                    .then(response => {
                        let i = this.products.map(data => data.product_id).indexOf(id);
                        this.products.splice(i, 1)
                    });
                });
            }

        }
})
</script>
<style lang="scss">
    #edit{
        margin-right: 10px;
    }
    #card {
    box-shadow: 0px 0px 0px grey;
    border-radius: 5px;
    transition: .3px;
    -webkit-transition:  box-shadow .2s ease-out;
    box-shadow: .4px .6px 2px grey;

    }
    #card:hover{ 
        box-shadow: 1px 5px 10px grey;
        transition: .3px;
        -webkit-transition:  box-shadow .2s ease-in;
    }
    .wrapper {
        margin-top:25px;
        width: 300px;
    }
    .card-loader {
    background-color: #fff;
    box-shadow: 0 1px 2px 1px rgba(0,0,0,.08), 0 -1px 3px 0 rgba(0,0,0,0.06);
    padding: 8px;
    position: relative;
    border-radius: 5px;
    margin-bottom: 0;
    height: 200px;
    overflow: hidden;

    &:only-child {
    margin-top:0;
    }

    &:before {
        content: '';
        height: 110px;
        display: block;
        background-color: #ededed;
        box-shadow: -48px 78px 0 -48px #ededed, -51px 102px 0 -51px #ededed;
    }

    &:after {
        content: '';
        background-color: #333;
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        left: 0;
        animation-duration: 0.6s;
        animation-iteration-count: infinite;
        animation-name: loader-animate;
        animation-timing-function: linear;
        background: -webkit-linear-gradient(left, rgba(255,255,255,0) 0%, rgba(255,255,255,0.6) 30%, rgba(255,255,255,0) 81%);
        background: -o-linear-gradient(left, rgba(255,255,255,0) 0%, rgba(255,255,255,0.6) 30%, rgba(255,255,255,0) 81%);
        background: linear-gradient(to right, rgba(255,255,255,0) 0%, rgba(255,255,255,0.6) 30%, rgba(255,255,255,0) 81%);
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#00ffffff', endColorstr='#00ffffff',GradientType=1 );
    }
    }


    // Loader animation
    @keyframes loader-animate{
    0%{
    transform: translate3d(-100%, 0, 0);
    }
    100%{
    transform: translate3d(100%, 0, 0);
    }
}
</style>