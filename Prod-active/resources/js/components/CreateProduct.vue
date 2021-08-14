<template>
    <div>
        <h3 class="text-center" id="centery">Create Product</h3>
        <div class="row" id="centery">
            <div class="col-md-6">
                <form @submit.prevent="addProduct(),checkForm()" method="POST" enctype="multipart/form-data" action="/api/products">
                      <p v-if="errors.length">
                            <b>Please correct the following error(s):</b>
                            <ul>
                            <li v-for="(error, i) in errors" v-bind:key="i">{{ error }}</li>
                            </ul>
                        </p>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="product.name">
                    </div>
                    <div class="form-floating">
                        <label for="floatingTextarea2">Description</label>
                        <textarea class="form-control" v-model="product.description" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
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
                    </select><br><br>
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
                errors:[],
                product: {},
                image:null,
                category: [],
            }
        },
        mounted(){
            this.loadCategories();
        },
        methods: {
            checkForm: function (e) {
            if (this.product.name && this.product.description && this.product.price && this.product.category_id) {
                return true;
            }

            this.errors = [];

            if (!this.product.name) {
                this.errors.push('Name required.');
            }
            if (!this.product.description) {
                this.errors.push('Description required.');
            }
            if (!this.product.price) {
                this.errors.push('Price required.');
            }else if(this.product.price != Number && this.product.price < 0){
                this.errors.push('Please Enter a valide price.');
            }
            if (!this.product.category_id) {
                this.errors.push('Category required.');
            }
            e.preventDefault();
            },
            loadCategories(){
                this.axios
                .get('/api/categories/')
                .then((res) => {
                    this.category = res.data;
                });
            },
            uploadImage(e){
                this.image = this.$refs.file.files[0];
                console.log(this.image);

            },
            addProduct() {
                this.product.image = this.image;
                this.axios
                    .post('/api/products', this.product)
                    .then((response) => (
                        this.$router.push('/')
                    ))
                    .catch(err => console.log(err))
            },
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
</style>