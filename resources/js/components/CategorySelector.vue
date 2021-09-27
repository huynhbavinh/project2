<template>
<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Dropdown button
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <input type="text" name="" id="">
    <a v-for="category in categories" :key="category.id" 
    class="dropdown-item" href="#">{{category.name}}</a>
  </div>
</div>
</template>

<script>
import axios from "axios";
    export default {
       data() {
         return{
          keyword: "",
          categories: [],
         }
       },
       methods: {
         getCategory(){
           axios
              .get("/resource/category?keyword="+this.keyword)
              .then((response)=>{
                this.categories = response.data;
           });
         }
       },
       watch: {
         keyword(){
           this.getCategory();
         }
       }
    }
</script>
