<template>
    <div class="container mt-5">
        <form @submit.prevent= "submit_form" >
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input v-model= "email" type="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input v-model= "password" type="password" class="form-control" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</template>

<script>
import axios from 'axios'
export default {
    name:"LoginView",
    data(){
        return{
            email:"",
            password:"",
        }
    },
    methods:{
        submit_form:function(){
            if(this.email.length>0 && this.password.length>0){
                let url = 'http://localhost:8000/api/login'
                let form = new FormData()
                form.set('email',this.email)
                form.set('password',this.password)
                axios.post(url,form)
                .then(res=>{
                    console.log(res.data)
                    this.$router.push('/')
                }).catch(error=>console.log(error))
            }else{
                alert('Provide password and Email')
            }
        }
    }
}
</script>
