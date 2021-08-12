<template>
   <div class="container mt-5">
       <div class="card">
           <div class="card-header">
               Country-City
           </div>
           <div class="card-body">
               <table class="table table-bordered">
                   <tr>
                       <th scope="col">Country</th>
                       <th scope="col">City</th>
                   </tr>
                   <tr v-for="(country,index) in this.countries" :key="index">
                       <td>
                           {{ country.country_name }}
                       </td>
                       <td>
                           <span v-for="(city,ind) in country.cities" :key="ind" >
                               {{city.city_name}},
                           </span>
                       </td>
                   </tr>
               </table>
           </div>
       </div>
   </div>
</template>

<script>
import axios from 'axios'
export  default {
    name:'CountryCity',
    data(){
        return{
            countries:[]
        }
    },
    mounted() {
        let url = '/country-city-list'
        axios.get(url).
        then(res=>{
            console.log(res.data)
            this.countries = res.data
        }).
        catch(error=>console.log(error.message))
    }
}
</script>
