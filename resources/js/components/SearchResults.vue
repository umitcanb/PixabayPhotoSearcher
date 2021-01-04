<template>
    <div class="d-flex flex-wrap"> 
        
        <div v-bind:key="i" v-for="(item, i) in response.hits">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" :src="item.webformatURL" alt="Card image cap">
                
                <div class="card-body">
                    <button @click="save(item)" class="btn btn-primary">Save</button>
                </div>
              

            </div>
        </div>
        
    </div>
         
       
</template>

<script>
    export default {
        props: ["response"], 
        data() {
            return {};
        },
        mounted() {
            console.log('Fancy component mounted!')

        },
        methods: {
            save(item){
                console.log(item);
                var data = {lowResolution: item.webformatURL};
                axios.post("/image/save", data).catch(console.error);
                
            }
        }
    }
    
</script>
