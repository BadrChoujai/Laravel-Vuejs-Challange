<template>
    <div>
        <h3 class="text-center">Edit Category</h3>
        <div class="editCat">
            <div class="col-md-6">
                <form @submit.prevent="updateCategory">
                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" class="form-control" v-model="category.name">
                    </div>
                    <button type="submit" class="btn btn-outline-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</template>
 
<script>
    export default {
        name:'EditCategory',
        data() {
            return {
                headers: {
                'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
                },
                category: {}
            }
        },
        created() {
            this.axios
                .get(`http://localhost:8000/api/categories/${this.$route.params.id}` , this.headers)
                .then((res) => {
                    this.category = res.data;
                });
            localStorage.getItem("token");
        },
        methods: {
            updateCategory() {
                this.axios
                    .put(`http://localhost:8000/api/categories/${this.$route.params.id}`, this.category)
                    .then((res) => {
                        this.$router.push({ name: 'Categories' });
                });
            }
        }
    }
</script>
<style scoped>
.text-center{
    margin-top: 15px;
}
.editCat{
    margin-top: 15px;
    margin-left: 30%;
}
</style>