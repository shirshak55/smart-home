<template>
    <div>
        <h2 class="text-center text-uppercase text-secondary mb-0">Smart Statistics</h2>
        <hr class="star-dark mb-5">

        <div class="card col-md-4 offset-md-4">
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Sunrise <i class="fa fa-sun-o" style="font-size:30px;color:black;"></i> <span class="badge badge-secondary badge-pill"> {{sunrise}}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Current Temperature <i class="fa fa-thermometer-2" style="font-size:30px;color:black;"></i> <span class="badge badge-secondary badge-pill">{{currentTemp}}°</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Minimum Temperature <i class="fa fa-thermometer-empty" style="font-size:30px;color:black;"></i> <span class="badge badge-secondary badge-pill">{{minTemp}}°</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Maximum Temperature <i class="fa fa-thermometer-full" style="font-size:30px;color:black;"></i> <span class="badge badge-secondary badge-pill">{{maxTemp}}°</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Sunset <i class="fa fa-sun-o" style="font-size:30px;color:black;"></i> <span class="badge badge-secondary badge-pill">{{sunset}}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Humidity <span class="badge badge-secondary badge-pill">{{humidity}}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Pressure <span class="badge badge-secondary badge-pill">{{pressure}}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Wind <span class="badge badge-secondary badge-pill">{{wind}}</span>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Smart-Info",
        data() {
            return {
                currentTemp: '',
                minTemp: '',
                maxTemp:'',
                sunrise: '',
                sunset: '',
                pressure: '',
                humidity: '',
                wind: '',
                overcast: '',
                icon: ''
            }
        },
        beforeMount: function()
        {
            let _this = this;
            this.fetchData();
            setInterval(this.fetchData,60000)
        },
        methods: {
            fetchData: function()
            {
                let url = "/smart_info";
                axios
                    .get(url)
                    .then(response => {
                        this.currentTemp = response.data.main.temp;
                        this.minTemp = response.data.main.temp_min;
                        this.maxTemp = response.data.main.temp_max;
                        this.pressure = response.data.main.pressure;
                        this.humidity = response.data.main.humidity + '%';
                        this.wind = response.data.wind.speed + 'm/s';
                        this.overcast = response.data.weather[0].description;
                        this.icon = "img/" + response.data.weather[0].icon.slice(0, 2) + ".svg";
                        this.sunrise = new Date(response.data.sys.sunrise*1000).toLocaleTimeString("en-GB").slice(0,5);
                        this.sunset = new Date(response.data.sys.sunset*1000).toLocaleTimeString("en-GB").slice(0,5);
                    })
                    .catch(error => {
                        console.log(error);
                    });
            }
        }
    }
</script>
