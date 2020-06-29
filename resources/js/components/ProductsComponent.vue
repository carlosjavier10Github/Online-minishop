<template>
    <div class="container">

        <div class="container">
            <div class="col-md-4" v-for="item in list">
                <div class="card mb-4 shadow-sm">
                    <img src="images/descarga.png" class='card-img-top'>
                    <div class="card-body">
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                            </div>
                            <small class="text-muted">9 mins</small>
                        </div>
                    </div>
                </div>
            </div>

            <infinite-loading @infinite="infiniteHandler"> </infinite-loading>
        </div>
    </div>
</template>

<script>
export default {

    data() {
        return{
            list:[],
            page:0
        }
    },

    methods: {
        infiniteHandler($state){
            this.page++
            let url= 'api/product?page='+ this.page

            axios.get(url)
            .then(response => {
                let products = response.data.data

                if (products.length) {
                    this.list = this.list.concat(products)
                    $state.loaded()
                }else{
                    $state.completed()
                }

            })
        }
    }

}
</script>

