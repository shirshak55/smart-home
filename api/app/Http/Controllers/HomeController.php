<?php

namespace App\Http\Controllers;

use App\Smartpower;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $smart_powers = Smartpower::all();
        return view('home',compact('smart_powers'));
    }
}
