<template>
    <div>
        <h2 class="text-center text-uppercase text-secondary mb-0">Smart Water</h2>
        <hr class="star-dark mb-5">
        <p>The water level is around <span :style="{color: color}">{{ status }}%</span></p>
        <div class="progress" v-if="display_status != null">
            <div class="progress-bar" role="progressbar" :style="{width : display_status+'%'}" :aria-valuenow="status" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "SmartWater",
        data() {
            return {
                status : [],
                color: '',
                display_status: null,
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
                this.setDisplayStatus();
            },
            setColor: function() {
                if(this.status == 90)
                {
                    this.color = 'green'
                }
                if(this.status == 50){
                    this.color =  'green'
                }

                if(this.status == 10)
                {
                    this.color =  'red'
                }
            },
            setDisplayStatus: function()
            {
                if(this.status === 'unknown'){
                    this.display_status = null;
                }

                this.display_status = this.status
            }
        }
    }
</script>

<style scoped>

</style>
