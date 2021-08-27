<template>
    <div class="card">
        <h3 class="text-center" id="centery">Create Product</h3>
        <div class="row" id="centery">
            <div class="col-md-6">
                <form @submit.prevent="addProduct(),checkForm()" method="POST" enctype="multipart/form-data" action="/api/products">
                    <div class="form-group">
                        <label>Name</label>
                        <input @change="checkForm()" type="text" class="form-control" v-model="product.name">
                        <label for="Name" class="red" v-text="errors.Name"></label>
                    </div>

                    <div class="form-floating">
                        <label for="floatingTextarea2">Description</label>
                        <textarea @change="checkForm()" class="form-control" v-model="product.description" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                        <label for="Name" class="red" v-text="errors.description"></label>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input @change="checkForm()" type="text" class="form-control" v-model="product.price">
                        <label for="Name" class="red" v-text="errors.price"></label>
                    </div>
                    <label>Category</label>
                    <div class="form-floating">
                        <select @change="checkForm()" v-model="product.category_id" name="category" class="custom-select" id="inputGroupSelect01">
                            <option  v-for="catego in category" v-bind:key="catego.id" :value="catego.id">
                                {{catego.name}}
                            </option>
                        </select>
                        <label for="Name" class="red" v-text="errors.category"></label>
                    </div>
                    <label>Product Image</label>
                    <div class="custom-file">
                        <input name="image" type="file" ref="file" @change="uploadImage" class="custom-file-input" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03">
                        <label class="custom-file-label" for="inputGroupFile03">Choose file</label>
                    </div>
                    <button style="margin-top:20px;" type="submit" class="btn btn-outline-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default { 
        data() {
            return {
                errors:{
                    Name:'' ,
                    description:'' ,
                    price:'',
                    category:'',
                },
                product: {},
                image:null,
                category: [],
            }
        },
        mounted(){
            this.loadCategories();
        },
        created(){
            localStorage.getItem("token");
        },
        methods: {
            checkForm: function () {
                if (this.product.name && this.product.description && this.product.price && this.product.category_id) {
                    return true;
                }

                this.errors = {
                    Name:'' ,
                    description:'' ,
                    price:'',
                    category:'',
                };

                if (!this.product.name) {
                    this.errors.Name = 'Name required.';
                }
                if (!this.product.description) {
                    this.errors.description = 'Description required.';
                }
                if (!this.product.price) {
                    this.errors.price = 'Price required.';
                }else if(this.product.price != Number && this.product.price < 0){
                    this.errors.price = 'Please Enter a valide price.';
                }
                if (!this.product.category_id) {
                    this.errors.category = 'Category required.';
                }
            },
            loadCategories(){
                this.axios
                .get('/api/categories')
                .then((res) => {
                    this.category = res.data.data;
                });
            },
            uploadImage(e){
                this.image = this.$refs.file.files[0];
            },
            addProduct() {
                this.product.image = this.image;
                this.axios
                    .post('/api/products',this.product)
                    .then((response) => (
                        this.$router.push('/products')
                    ))
                    .catch(err => console.log(err))
            },
        }
    }
</script>
<style scoped>
#centery{
    margin-top:10px;
    display:flex;
    justify-content: center;
    margin-bottom:40px;
}
.red{
    color: rgb(248, 66, 81);;
}
.card{
    margin-top: 20px;
    padding:20px;
}

</style>