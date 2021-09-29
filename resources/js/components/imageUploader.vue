<template>
   <div>
        <input type="file" name="thumbnail" ref="input" class="hidden" @change="fileChange" style="visibility: hidden;">
        <button class="btn btn-default border" @click.prevent="openFile">Select Imgage</button>
        <img ref="previewImg" style="max-width = 250px" >
   </div>

</template>

<script>
import axios from 'axios';
    export default {
       methods:{
           openFile(){
               this.$refs.input.click();
           },
           fileChange(){
               let file = this.$refs.input.files[0];
                this.$refs.previewImg.src = URL.createObjectURL(file);

                //upload file
                let formData = new FormData();
                formData.append('thumbnail',file);
                axios.post('/user/upload-thumbnail',formData).then(response=>{
                    console.log(response);
                    this.$refs.previewImg.src = '/storage/thumbnails/'+response.data.filename;
                });
           },
       }
    }
</script>
