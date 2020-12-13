<template>
    <div class="d-flex flex-wrap"> 
        
        <div v-bind:key="i" v-for="(item, i) in response.hits">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" :src="item.webformatURL" alt="Card image cap">
                <div class="card-body">
                    {{item.pageURL}}
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
            console.log('Component mounted.')
        },
        methods: {
            save(item){
                var data = {highResolution: item.pageURL, lowResolution: item.previewURL}
                axios.post("/image/save", data);
            }
        }
    }
    
</script>
