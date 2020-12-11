<template>
    <div class="d-flex flex-wrap"> 
        
        <div v-bind:key="i" v-for="(hit, i) in response.hits">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" :src="hit.webformatURL" alt="Card image cap">
                <div class="card-body">
                    <a href="#" class="btn btn-primary">Download</a>
                </div>
            </div>
        </div>
        
    </div>
         
       
</template>

<script>
    export default {
        props: ["response"],
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
