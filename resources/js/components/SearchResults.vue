<template>
    <div class="d-flex flex-wrap"> 
        
        <div v-bind:key="i" v-for="(hit, i) in response.hits">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" :src="hit.webformatURL" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
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
