<template>
    <div>
        <h2 class="text-center text-uppercase text-secondary mb-0">Smart Water</h2>
        <hr class="star-dark mb-5">
        <p>The water level is around <span :style="{color: color}">{{ status }}%</span></p>
    </div>
</template>

<script>
    export default {
        name: "SmartWater",
        data() {
            return {
                status : [],
                color: ''
            }
        },
        mounted: function()
        {
            let _this = this;
            this.fetchData();
            setInterval(this.fetchData,3000)
        },
        methods: {
            fetchData: async function()
            {
                let {data} =  await axios.get('/smart_water');
                this.status = data;
                this.setColor();
            },
            setColor: function() {
                console.log(this.status)
                if(this.status == 90)
                {
                    this.color = 'green'
                }
                if(this.status == 50){
                    this.color =  'yellow'
                }

                if(this.status == 10)
                {
                    this.color =  'red'
                }
            }
        }
    }
</script>

<style scoped>

</style>
