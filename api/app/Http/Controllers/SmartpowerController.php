<?php

namespace App\Http\Controllers;

use App\Smartpower;

class SmartpowerController extends Controller
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
        return Smartpower::all();
    }

    public function getStatus(Smartpower $smartpower)
    {
        return $smartpower->getStatus();
    }

    public function setStatusOn(Smartpower $smartpower)
    {
        return $smartpower->forceFill(['pin_status','1'])->update();
    }

    public function setStatusOff(Smartpower $smartpower)
    {
        return $smartpower->forceFill(['pin_status','0'])->update();
    }
}
