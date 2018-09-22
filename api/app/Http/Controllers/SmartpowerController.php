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

    public function setStatusOn(Smartpower $smart_power)
    {
        $smart_power->forceFill(['pin_status'=>'1'])->save();

        return response()->json(null,201);
    }

    public function setStatusOff(Smartpower $smart_power)
    {
        $smart_power->forceFill(['pin_status'=>'0'])->save();
        return response()->json(null,201);
    }
}
