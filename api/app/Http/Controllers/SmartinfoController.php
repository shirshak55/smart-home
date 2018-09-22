<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;

class SmartinfoController extends Controller
{
    public function showInfo()
    {
        $client = new Client();
        $req = $client->request('GET', 'https://api.openweathermap.org/data/2.5/weather?APPID=1d4238c34008e95e860c41b9d6da08e7&lat=27.620089&lon=85.538746&units=metric', []);

        return json_encode(json_decode($req->getBody()));
    }
}
