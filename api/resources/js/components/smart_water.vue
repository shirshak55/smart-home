<template>
    <div>
        <h2 class="text-center text-uppercase text-secondary mb-0">Smart Power</h2>
        <hr class="star-dark mb-5">
        {{ status }}
    </div>
</template>

<script>
    export default {
        name: "SmartPowers",
        data() {
            return {
                status : []
            }
        },
        mounted: function()
        {
            let _this = this;
            this.fetchData();
            setInterval(this.fetchData,5000)
        },
        methods: {
            fetchData: async function()
            {
                let {data} =  await axios.get('/smart_waters');
                this.status = data;
            }
        }
    }
</script>

<style scoped>

</style>
