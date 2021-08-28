<template>
    <div id="login" class="container top">
        <div class="row">
            <div class="col-md-6 mt-5 mx-auto">
                <form v-on:submit.prevent="login">
                <h1 class="h3 mb-3 font-weight-normal" style="text-align:center;">Sign in</h1>
                <div class="form-group">
                    <label for="email"> Email Address</label>
                    <input type="email" v-model="email" class="form-control" name="email" placeholder="Email Address">
                </div>
                <div class="form-group">
                    <label for="password"> Password</label>
                    <input type="password" v-model="password" class="form-control" name="password" placeholder="Password">
                </div>
                <button class="btn btn-lg btn-primary btn-block">Sign in</button>
                <p>You don't have an account? <router-link to="/register">Register</router-link></p>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
import auth from '../auth.js'
import Repository from "../repositories/RepositoryFactory";
const UserRepository = Repository.get("user");
// import EventBus from './EventBus.vue'
export default ({
    name:'Login',
    data(){
        return {
            auth:auth,
            email: '',
            password: '',
        }
    },
    methods:{
        // login: function() {
        //     const { data } = UserRepository.Post(this.email, this.password);
        //     console.log(data);
        //     // this.auth.user.authenticated = true;
        //     // this.$router.push('/products');
        //     // this.emitMethod();
        // },
        login() {
            this.axios.post('/api/login',
                {
                    email:this.email,
                    password:this.password,
                })
                .then((res) => {    
                    if (res.data.token) {
                        // Saving Token
                        localStorage.setItem('token', res.data.token)
                        axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('token')
                        this.auth.user.authenticated = true;
                        this.$router.push('/products')
                    }
                })
                .catch((err) => {
                    console.log(err)
                })
                // this.emitMethod()
        },
        //   this function was used to set the status of the user as logged in

        //   emitMethod() {
        //         EventBus.$emit('logged-in','loggedin')
        //   }
    }
})
</script>
<style scoped>
.top{
    margin-top: 10%;
}
</style>