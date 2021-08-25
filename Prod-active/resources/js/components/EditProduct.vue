<template>
    <div>
        <h3 class="text-center">Edit Product</h3>
        <div class="row" id="centery">
            <div class="col-md-6">
                <form @submit.prevent="updateProduct">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="product.name">
                    </div>
                     <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" v-model="product.description">
                    </div>
                     <div class="form-group">
                        <label>Price</label>
                        <input type="text" class="form-control" v-model="product.price">
                    </div>
                    <label>Category</label>
                    <select  v-model="product.category_id" name="category" class="custom-select" id="inputGroupSelect01">
                        <option v-for="catego in category" v-bind:key="catego.id" :value="catego.id">
                            {{catego.name}}
                        </option>
                    </select><br>
                     <!-- <div class="form-group">
                        <label>Image</label>
                        <input type="text" class="form-control" v-model="product.image">
                    </div> -->
                    <button type="submit" class="btn btn-outline-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                headers: {
                'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
                },
                product: {},
                category:[]
            }
        },
        created() {
            this.axios
                .get('/api/categories/',this.headers)
                .then((res) => {
                    this.category = res.data.data;
                });    
                
        },
        mounted(){
                this.axios
                .get(`/api/products/${this.$route.params.id}`)
                .then((res) => {
                    this.product = res.data;
                });
        },
        methods: {
            updateProduct() {
                this.axios
                    .put(`/api/products/${this.$route.params.id}`, this.product)
                    .then((res) => {
                        this.$router.push({ name: 'Products' });
                });
            }
        }
    }
</script>
<style scoped>
#centery{
    margin-top:40px;
    display:flex;
    justify-content: center;
    margin-bottom:40px;
}
h3{
    margin-top:20px;
}
</style>