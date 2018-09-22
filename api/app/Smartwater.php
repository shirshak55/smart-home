<?php

namespace App;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Model;

class Smartwater extends Model
{
    protected $casts = [
        'data' => 'array',
    ];

    public function getCurrentWaterLevel()
    {

        $max_level_pin_status = $this->queryPin($this->data['maximum_level_pin_number']);
        if($max_level_pin_status == 1) {
            return $this->data['maximum_level'];
        }

        $med_level_pin_status = $this->queryPin($this->data['medium_level_pin_number']);
        if($med_level_pin_status == 1) {
            return $this->data['medium_level'];
        }

        $min_level_pin_status = $this->queryPin($this->data['minimum_level_pin_number']);
        if($min_level_pin_status == 1) {
            return $this->data['minimum_level'];
        }

        return 'unknown';
    }

    public function queryPin($pin_number)
    {
        $client = new Client();

        $req = $client->request('GET', config('pi.url').'/status/'.$pin_number);

        return json_decode($req->getBody())->status;
    }
}
