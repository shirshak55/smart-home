<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Smartpower extends Model
{
    protected $casts = [
        'conditions' => 'array'
    ];

    protected $guarded = [];
}
