<?php

namespace App\Http\Controllers;

class PinController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function getAllPinInfo()
    {
        return 'all pin info';
    }

    public function getStatus($pin_no)
    {
        $status = exec('gpio -g read '.$pin_no);
        return response()->json(['status'=> $status,'pin_no'=>$pin_no],201);
    }

    public function setStatus($pin_no,$value)
    {
        system("gpio -g mode ". $pin_no." out");

        if($value){
            system("gpio -g write ". $pin_no. " 1");
        }else{
            system("gpio -g write ". $pin_no. " 0");
        }

        return response()->json(['pin'=>$pin_no,'status'=> $value],201);
    }
}
