<template>
    <div>
        <h3 class="text-center">Edit category</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateCategory">
                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" class="form-control" v-model="category.name">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
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
                .get(`http://localhost:8000/api/categories/${this.$route.params.id}`)
                .then((res) => {
                    this.category = res.data;
                });
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