<template>
    <div>
        <h2 class="text-center text-uppercase text-secondary mb-0">Smart Statistics</h2>
        <hr class="star-dark mb-5">

        <div id="weather">
            <img src="img/sunny.svg"> {{overcast}}
            <span class="temperature">{{currentTemp}}°</span><br>
            <span id="temp-values">Min {{minTemp}}° <br> Max {{maxTemp}}°</span>
        </div>
        <div id="info">
            <img class="icon" :src=icon> {{sunrise}}
            <img class="icon" src="img/sunset.svg"> {{sunset}}
            <img class="icon" src="img/humidity.svg"> {{humidity}}
            <img class="icon" src="img/pressure.svg"> {{pressure}}
            <img class="icon" src="img/wind.svg"> {{wind}}
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
                let url = "https://api.openweathermap.org/data/2.5/weather?APPID=1d4238c34008e95e860c41b9d6da08e7&q=London,uk&units=metric";
                axios
                    .get(url)
                    .then(response => {
                        console.log(response)
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
