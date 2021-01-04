<template>
    <div> 
            <h3>Saved Photos</h3>
            <div  class="d-flex flex-wrap" v-bind:key="i" v-for="(photo, i) in photos">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" :src="photo" alt="Card image cap">

                </div>
            </div>
       
        
    </div>
         
       
</template>

<script>
    export default {
        props: ["photos"], 
        data() {
            return {
            };
        },
        mounted() {
            console.log('Component mounted.')
        },
    }
    
</script>
