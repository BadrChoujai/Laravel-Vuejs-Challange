<template>
    <div id="categories">
        <div class="col-lg-9">
            <div class="row mt-4">
                    <table class="rwd-table">
                        <tbody>
                        <tr>
                            <th>Category Id</th>
                            <th>Category Name</th>
                            <th>Last Modified</th>
                            <th>Actions</th>
                        </tr>
                        <tr v-for="(category) in categories" :key="category.id">
                            <td data-th="Id">
                                {{category.id}}
                            </td>
                            <td data-th="Name">
                                {{category.name}}
                            </td>
                            <td data-th="Modified At">
                                {{ truncate_string(category.updated_at) }}
                            </td>
                            <td data-th="Action">
                                <router-link :to="{name: 'editCategory', params: { id: category.id }}" id="edit" class="btn btn-outline-success">Edit</router-link>
                                <button class="btn btn-outline-danger" @click="deleteCategory(category.id)">Delete</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</template>
<script>
import moment from 'moment'
export default ({
    name:'Categories',
    data: function () {
            return {
                categories: [],
                date:new Date(),
            }
        },

        mounted() {
            this.loadCategories();
        },

        methods: {
            truncate_string(date) {
                if(date){
                    var dt = moment(date).format("YYYY-MM-DD HH:mm:ss");
                    return dt;
                }else
                    return dt = ' - NONE - ';
            },
            loadCategories: function () {
                    this.axios.get('/api/categories')
                    .then((response) => {
                        this.categories = response.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    })
            },
            deleteCategory(id){
              this.$confirm(`Are you sure?`, 'Delete', 'warning').then(() => {
                this.axios
                    .delete(`/api/categories/${id}`)
                    .then(response => {
                        let i = this.categories.map(data => data.id).indexOf(id);
                        this.categories.splice(i, 1)
                    });
              });    
            }

        }
})
</script>
<style lang="scss" scoped>
#edit{
    margin-right: 10px;
}
    
@import 'https://fonts.googleapis.com/css?family=Open+Sans:600,700';

* {font-family: 'Open Sans', sans-serif;}

.rwd-table {
  min-width: 300px;
  max-width: 100%;
  display: flex;
  border-collapse: collapse;
}

.rwd-table tr:first-child {
  border-top: none;
  background: #343a40;
  color: #fff;
}

.rwd-table tr {
  padding-right: 150px;
  border-top: 1px solid #ddd;
  border-bottom: 1px solid #ddd;
  background-color: #f5f9fc;
}

.rwd-table tr:nth-child(odd):not(:first-child) {
  background-color: #ebf3f9;
}

.rwd-table th {
  display: none;
}

.rwd-table td {
  display: block;
}

.rwd-table td:first-child {
  margin-top: .5em;
}

.rwd-table td:last-child {
  margin-bottom: .5em;
}

.rwd-table td:before {
  content: attr(data-th) ": ";
  font-weight: bold;
  width: 120px;
  display: inline-block;
  color: #000;
}

.rwd-table th,
.rwd-table td {
  text-align: left;
}

.rwd-table {
  color: #333;
  border-radius: .4em;
  overflow: hidden;
}

.rwd-table tr {
  border-color: #bfbfbf;
}

.rwd-table th,
.rwd-table td {
  padding: .5em 1em;
}
@media screen and (max-width: 601px) {
  .rwd-table tr:nth-child(2) {
    border-top: none;
  }
}
@media screen and (min-width: 600px) {
  .rwd-table tr:hover:not(:first-child) {
    background-color: #61616144;
  }
  .rwd-table td:before {
    display: none;
  }
  .rwd-table th,
  .rwd-table td {
    display: table-cell;
    padding: .25em .5em;
  }
  .rwd-table th:first-child,
  .rwd-table td:first-child {
    padding-left: 50px;
  }
  .rwd-table th:last-child,
  .rwd-table td:last-child {
    padding-right: 60px;
  }
  .rwd-table th,
  .rwd-table td {
    padding: 1em;
    padding-right: 25px;
    padding-left: 57px;
  }
}


/* THE END OF THE IMPORTANT STUFF */

/* Basic Styling */
body {
background: #4B79A1;
background: -webkit-linear-gradient(to left, #4B79A1 , #283E51);
background: linear-gradient(to left, #4B79A1 , #283E51);        
}
h1 {
  text-align: center;
  font-size: 2.4em;
  color: #f2f2f2;
}
.container {
  display: block;
  text-align: center;
}
h3 {
  display: inline-block;
  position: relative;
  text-align: center;
  font-size: 1.5em;
  color: #cecece;
}
h3:before {
  content: "\25C0";
  position: absolute;
  left: -50px;
  -webkit-animation: leftRight 2s linear infinite;
  animation: leftRight 2s linear infinite;
}
h3:after {
  content: "\25b6";
  position: absolute;
  right: -50px;
  -webkit-animation: leftRight 2s linear infinite reverse;
  animation: leftRight 2s linear infinite reverse;
}
@-webkit-keyframes leftRight {
  0%    { -webkit-transform: translateX(0)}
  25%   { -webkit-transform: translateX(-10px)}
  75%   { -webkit-transform: translateX(10px)}
  100%  { -webkit-transform: translateX(0)}
}
@keyframes leftRight {
  0%    { transform: translateX(0)}
  25%   { transform: translateX(-10px)}
  75%   { transform: translateX(10px)}
  100%  { transform: translateX(0)}
}

    
</style>