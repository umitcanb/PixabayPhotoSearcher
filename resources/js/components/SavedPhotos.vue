<template>
    <div> 
            <h3>Saved Photos</h3>
            <div  class="d-flex flex-wrap" v-bind:key="i" v-for="(photo, i) in photos">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" :src="photo" alt="Card image cap">
                    <div class="card-body">
                    <button @click="unsave(photo)" class="btn btn-danger">Unsave</button>
                </div>

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
        methods: {
            unsave(photo){
                console.log(photo);
                var data = {url : photo};
                axios.post("/image/unsave", data).then(response => {
                window.location.replace("/saved");
            });
                
            }
        }
    }
    
</script>
