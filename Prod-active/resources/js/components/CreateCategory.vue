<template>
    <div class="card">
        <h3 class="text-center" style="text-align:center; margin-top: 10px;">Create Category</h3>
            <hr>
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
.card{
    margin-top: 20px;
    padding:20px;
}
#centery{
    margin-top:30px;
    margin-left:10%;
    display: flex;
    flex-direction: column;
    align-content: center;
}
.form-control{
    width:80%;
    display:flex;
    justify-content: center;
}
</style>