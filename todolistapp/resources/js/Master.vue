<template>
    <div>
        <form @submit.prevent= "sub_task">
            <input type="text" v-model= "task" >
            <button>Add task</button>
        </form>
    </div>
</template>

<script>
import axios from 'axios'
export default {
    data(){
        return{
            task:""
        }
    },
    mounted(){
        console.log("Master mounter")
    },
    methods:{
        sub_task:function(){
            if(this.task.length>0)
            {
                console.log('clicked')
                let form = new FormData()
                form.set('task',this.task)
                let url = 'http://127.0.0.1:8000/create-todo'
                axios.post(url,form).then(res=>{
                    console.log(res.data)
                    console.log('success')
                }).catch(error=>console.log(error))
            }
            else{
                alert(`Please insert a task...`)
            }
        }
    }
}
</script>
