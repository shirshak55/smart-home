<?php

namespace App;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Model;

class Smartpower extends Model
{
    protected $casts = [
        'conditions' => 'array',
        'pin_status' => 'boolean',
    ];

    protected $guarded = [];

    public function setPin()
    {
        $client = new Client();
        $pin_status = (int) $this->pin_status;
        $req = $client->request('GET', config('pi.url').'/status/'.$this->pin_number.'/set/'.$pin_status, []);
        return json_decode($req->getBody());
    }

    public function getStatus()
    {
        $client = new Client();
        $req = $client->request('GET',config('pi.url').'/status/'.$this->pin_number);
        return json_decode($req->getBody());
    }
}
