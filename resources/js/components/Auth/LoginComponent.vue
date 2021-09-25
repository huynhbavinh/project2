<template>
   <div>
       <form action="" method="post" @submit.prevent="login()">
            <input id="username" 
            type="text" 
            class="form-control" 
            name="username" 
            required autocomplete="username" autofocus
            v-model="user.username"
            >
           <br>
            <input id="password" 
            type="password" 
            class="form-control" 
            name="password" 
            required autocomplete="current-password"
            v-model="user.password">
           <button type="submit">đăng nhập</button>
       </form>
   </div>
</template>

<script>
    export default {
        data(){
            return{
                user:{
                    username: '',
                    password: ''
                },
                errors:{

                }
            }   
        },
        methods:{
            login(){
                axios.post('/login',this.user).then(response => {
                    console.log(response.data.errors);
                });
                console.log('login')
            }
        }
    }
</script>
