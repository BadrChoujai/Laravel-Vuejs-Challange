<template>
    <div id="navi" class="container"> 
        <nav class="navbar navbar-expand-md">
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav left">
                    <a class="nav-item nav-link active">
                          <li v-if="auth.user.authenticated">
                            <router-link to="/products">Products</router-link>
                        </li>         
                    </a>
                    <a class="nav-item nav-link active">
                        <li v-if="auth.user.authenticated">
                            <router-link to="/Categories">Categories</router-link>
                        </li>
                    </a>
                    <a class="nav-item nav-link active">
                        <li v-if="auth.user.authenticated">
                            <router-link to="/CreateCategory">Create Category</router-link>
                        </li>
                    </a>
                    <a class="nav-item nav-link active">
                        <li v-if="auth.user.authenticated">
                            <router-link to="/Create">Create Product</router-link>
                        </li>
                    </a>
                </div>
                <div class="navbar-nav right">
                    <a href="#" class="nav-item1 nav-link active">
                        <li class="pull-right" v-if="auth.user.authenticated">
                        <a href="javascript:void(0)" v-on:click="signout">Sign out</a>
                    </li>
                    </a>
                    <li class="pull-right" v-if="auth.user.authenticated">
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
    padding: 10px;
    background-color: #343a40;
    -webkit-box-shadow: 0 0 8px rgba(0, 0, 0, 0.568);
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-shadow: 0 0 8px rgba(0, 0, 0, 0.568);
    box-sizing: border-box;
}
a{
    color: rgb(153, 153, 153);
}
a:hover {
    color: #f3f3f3;
    text-decoration:none;
}
.nav-link{
    padding:0;
}

</style>