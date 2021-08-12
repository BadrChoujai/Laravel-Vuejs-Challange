<template>
    <div class="container"> 
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
            <router-link class="navbar-brand" to="/">PRODUCT-IVE</router-link>
            <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Products
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" id="dark" aria-labelledby="navbarDarkDropdownMenuLink">
                        <li><router-link to="/" class="nav-item nav-link"><strong>Products List</strong></router-link></li>
                        <li><router-link to="/create" class="nav-item nav-link"><strong>Create Product</strong></router-link></li>
                    </ul>
                    </li>
                </ul>
            </div>
            <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Categories
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" id="dark" aria-labelledby="navbarDarkDropdownMenuLink">
                        <li><router-link to="/Categories" class="nav-item nav-link"><strong>Categories List</strong></router-link></li>
                        <li><router-link to="/createCategory" class="nav-item nav-link"><strong>Create Category</strong></router-link></li>
                    </ul>
                    </li>
                </ul>
            </div>
            <!-- <div class="collapse navbar-collapse">
                <div class="navbar-nav" >
                </div>
            </div> -->
        </nav>
        <router-view> </router-view>
    </div>
</template>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
<script>
    export default {}
</script>
<style scoped>
#centery{
    display:flex;
    text-align: center;
}
#dark{
    background-color: #343a40;
}
#dark strong{
    color:white;
}

#dark strong:hover{
    color:lightgray;
}
</style>