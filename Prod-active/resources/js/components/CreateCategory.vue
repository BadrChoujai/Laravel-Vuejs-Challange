<template>
    <div>
        <h3 class="text-center" id="centery">Create Category</h3>
        <div class="row" id="centery">
            <div class="col-md-6">
                <form @submit.prevent="addCategory()">
                    <div class="form-group" >
                        <label>Category Name</label>
                        <input type="text" class="form-control" v-model="category.name">
                    </div>
                    <button type="submit" class="btn btn-outline-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
        data() {
            return {
                category: {},
            }
        },
        created(){
            localStorage.getItem("token");
        },
        methods: {
            addCategory() {
                this.axios
                    .post('/api/categories', this.category)
                    .then((response) => (
                        this.$router.push('Categories')
                    ))
                    .catch(err =>  console.log(err))
            }
        }
    }
</script>
<style scoped>
#centery{
    margin-top:40px;
    display:flex;
    justify-content: center;
}
</style>