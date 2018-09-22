<?php

namespace App\Http\Controllers;

use App\Smartpower;
use App\Smartwater;

class SmartwaterController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function showInfo()
    {
        return Smartwater::first()->getCurrentWaterLevel();
    }
}
