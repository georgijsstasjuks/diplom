<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
            <line-chart :chart-data="data" :height="100" :options="{responsive: true, maintainAspectRatio: true}"></line-chart>
                <button @click="update" class="btn btn-info"> Update </button>
            </div>

        </div>
    </div>
</template>

<script>
    import LineChart from "./LineChart"
    export default {
        components: {
            LineChart
        },
     data: function(){
       return {
           data: []
       }
     },
        mounted() {
            this.update()
        },
        methods:{
            update: function(){
              axios.get('/data-random').then((response) =>{
                  this.data = response.data
              });
            }
        }
    }
</script>
