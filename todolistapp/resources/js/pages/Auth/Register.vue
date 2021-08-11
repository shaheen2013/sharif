<template>
    <div class="container mt-5">
        <form @submit.prevent= "submit_form" >
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input v-model= "name" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input v-model= "email" type="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input v-model= "password" type="password" class="form-control" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input v-model= "c_password" type="password" class="form-control" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</template>

<script>
import axios from 'axios'
export default {
    name:"RegisterView",
    data(){
        return{
            name:"",
            email:"",
            password:"",
            c_password:""
        }
    },
    methods:{
        submit_form:function(){
            if(this.name.length>0 && this.email.length>0 && this.password.length>0 && this.c_password.length>0){
                let url = 'http://localhost:8000/api/register'
                let form = new FormData()
                form.set('name',this.name)
                form.set('email',this.email)
                form.set('password',this.password)
                form.set('c_password',this.c_password)
                axios.post(url,form).then(res=>console.log(res.data)).catch(err=>console.log(err))
            }else{
                alert('Provide all info')
            }
        }
    }
}
</script>
