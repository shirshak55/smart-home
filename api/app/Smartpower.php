<?php

namespace App;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Model;

class Smartpower extends Model
{
    protected $casts = [
        'conditions' => 'array'
    ];

    protected $guarded = [];

    public function setPin(Client $client)
    {
        $req = $client->request('GET', config('pi.url').'/status/'.$this->pin_number.'/set/'.$this->pin_status, []);
        dd($req->getStatusCode());
    }

    public function getStatus(Client $client)
    {
        $req = $client->request('GET',config('pi.url').'/status/'.$this->pin_number);
        dd($req->getBody());
    }
}
