<template>
    <div class="app">
        <!-- <Navbar/> -->
        <!-- <router-view /> -->
    </div>    
</template>
<script>
import Products from './components/Products.vue'
import Navbar from './components/Navbar.vue'
export default ({
    name:'App',
    components:{
        Navbar,
        Products,
    },
})
</script>
