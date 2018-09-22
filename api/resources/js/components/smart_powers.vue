<template>
    <div>
        <h2 class="text-center text-uppercase text-secondary mb-0">Smart Power</h2>
        <hr class="star-dark mb-5">
        <form class="form-horizontal">

            <div class="form-group" v-for="(smart_power,index) in smart_powers">
                <div class="form-check checkbox-slider--b" v-if="smart_power">
                    <label>
                        <input type="checkbox" @change="toggle($event,index,smart_power.id)" v-model="smart_powers[index].pin_status" id='bulb_input'><span>{{ smart_power.name }}</span>
                    </label>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        name: "SmartPowers",
        data() {
            return {
                smart_powers : []
            }
        },
        mounted: function()
        {
            let _this = this;
            this.fetchData();
            setInterval(this.fetchData,5000)
        },
        methods: {
             toggle: async function($event,index,id){
                let pin_status = this.smart_powers[index].pin_status
                if(pin_status == false){
                    axios.get('/smart_powers/'+id+'/off')
                } else {
                    axios.get('/smart_powers/'+id+'/on')
                }
            },
            fetchData: async function()
            {
                let {data} =  await axios.get('/smart_powers');
                this.smart_powers = data;
            }
        }
    }
</script>

<style scoped>

</style>
