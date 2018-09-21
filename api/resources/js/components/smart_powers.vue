<template>
    <div>
        <h2 class="text-center text-uppercase text-secondary mb-0">Smart Power</h2>
        <hr class="star-dark mb-5">
        <form class="form-horizontal">

            <div class="form-group" :for="smart_power in smart_powers">
                <div class="form-check checkbox-slider--b">
                    <label>
                        <input type="checkbox" :checked="smart_power.pin_status == true" id='bulb_input'><span>{{ smart_power.name }}</span>
                    </label>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        name: "Smart-Powers",
        data: function()
        {
            return {
                'smart_powers': [],
            }
        },
        mounted: async function()
        {
            let {data} = await axios.get('/smart_powers');
            this.smart_powers = data;
        }
    }
</script>

<style scoped>

</style>
