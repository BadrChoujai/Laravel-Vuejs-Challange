<template>
    <div class="container"> 
        <nav class="navbar navbar-expand-md" v-if="auth.user.authenticated">
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav left">
                    <a class="nav-item nav-link active">
                        <li>
                            <router-link to="/products">Products</router-link>
                        </li>
                    </a>
                    <a class="nav-item nav-link active">
                        <li>
                            <router-link to="/Categories">Categories</router-link>
                        </li>
                    </a>
                    <a class="nav-item nav-link active">
                        <li>
                            <router-link to="/CreateCategory">Create Category</router-link>
                        </li>
                    </a>
                    <a class="nav-item nav-link active">
                        <li>
                            <router-link to="/Create">Create Product</router-link>
                        </li>
                    </a>
                </div>
                <div class="navbar-nav right">
                        <li class="nav-item1 nav-link active pull-right" style="margin-top:11px;">
                            <a href="javascript:void(0)" v-on:click="signout">Sign out</a>
                        </li>
                    <li class="pull-right" >
                        <p v-if="auth.user.profile != null">Hi, {{toUpper(auth.user.profile.user.name)}}</p>
                        <p v-else>Welcome Back,</p>
                    </li>
                </div>
            </div>
        </nav>
        <router-view></router-view>
    </div>
</template>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
<script>
import auth from '../js/auth.js'
// import routes from "./routes";
export default {    
    data() {
            return {
                auth: auth,
            }
        },
        methods: {
            signout() {
                localStorage.removeItem('token');
                $cookies.remove('token');
                this.auth.user.authenticated = false;
                this.auth.user.profile = null;
                this.$router.push('/login');
            },
            toUpper(str){
                return str.toUpperCase();
            }
        },
        created: function () {
            this.$nextTick(function () {
                auth.check()
            })
        },
        mounted(){
            $cookies.set('token', localStorage.getItem("token"), '1d');   //return this
        }
}
</script>
<style scoped>
.left{
    float:left;
}
.right{
    position: absolute;
    left: 680px;
    margin-top: 15px;
}
p{
    color: whitesmoke;
}
nav{
    border-bottom-right-radius: 0.75rem;
    border-bottom-left-radius: 0.75rem;
    padding: 10px;
    background-color: #343a40;
    -webkit-box-shadow: 0 0 8px rgba(0, 0, 0, 0.568);
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-shadow: 0 0 8px rgba(0, 0, 0, 0.568);
    box-sizing: border-box;
}
li,a{
    padding: 10px;
    color: rgb(153, 153, 153);
}
a:hover {
    border-radius: 0.40rem;
    background-color: #4a5057;
    color: #f3f3f3;
    text-decoration:none;
}
.nav-link{
    padding:0;
}

</style>