import axios from 'axios'
// import routes from './routes'
import qs  from 'qs';
export default {
    user: {
        authenticated: false,
        profile: null,
        token: localStorage.getItem('token')
    },
    check() {
        if (this.user.token !== null) {
            axios.get(
                '/api/user?token=' + this.user.token,
            ).then(response => {
                this.user.authenticated = true
                this.user.profile = response.data
                $cookies.set('token', localStorage.getItem("token"), '1d');   //return this
            })
        }
    },
    register(context, name, email, password, password_confirmation) {
        axios.post(
            '/api/register',
            {
                name: name,
                email: email,
                password: password,
                password_confirmation: password_confirmation
            }
        ).then(response => {
            context.success = true
        }, response => {
            context.response = response.data
            context.error = true
        })
    },
    signin(context, email, password) {
        axios.post(
            '/api/login', qs.stringify(
            {
                email: email,
                password: password
            })
        ).then(response => {
            context.error = false
            localStorage.setItem('token', response.data.token)
            axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.user.token
            $cookies.set('token', localStorage.getItem("token"), '1d');   //return this
            this.user.authenticated = true
            this.user.profile = response.data

            this.$router.push('/products');
        }, response => {
            context.error = true
        })
    },
    
}