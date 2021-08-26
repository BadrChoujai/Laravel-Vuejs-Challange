<template>
  <div class="container top">
    <div class="row">
      <div class="col-md-6 mt-5 mx-auto">
        <form v-on:submit.prevent="register">
          <h1 class="h3 mb-3 font-weight-normal" style="text-align:center;">Sign up</h1>
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" v-model="name" class="form-control" name="name" placeholder="Full name">
          </div>
          <div class="form-group">
            <label for="email"> Email Address</label>
            <input type="email" v-model="email" class="form-control" name="email" placeholder="Email Address">
          </div>
          <div class="form-group">
            <label for="password"> Password</label>
            <input type="password" v-model="password" class="form-control" name="password" placeholder="Password">
          </div>
            <div class="form-group">
            <label for="password"> Confirm Password</label>
            <input type="password" v-model="password_confirmation" class="form-control" name="password" placeholder="Confirm password">
          </div>
          <button class="btn btn-lg btn-primary btn-block">Register</button>
        </form>
        <p>You have an account? <router-link to="/login">Login</router-link></p>
      </div>
    </div>
  </div>

</template>

<script>
    import axios from 'axios'

    export default{
        data(){
            return {
                name: '',
                email: '',
                password: '',
                password_confirmation: '',
            }
        },

        methods:{
            register() {
                axios.post('/api/register',
                    {
                        name:this.name,
                        email:this.email,
                        password:this.password,
                        password_confirmation:this.password_confirmation,
                    })
                    .then((res) => {
                        this.$router.push('Login')
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },


        }
    }
</script>
<style scoped>
.top{
  margin-top: 5%;
}
</style>