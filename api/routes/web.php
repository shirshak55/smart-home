<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('smart_powers','SmartpowerController@showInfo');
Route::get('smart_powers/{smart_power}/status','SmartpowerController@getStatus');
Route::get('smart_powers/{smart_power}/on','SmartpowerController@setStatusOn');
Route::get('smart_powers/{smart_power}/off','SmartpowerController@setStatusOff');

Route::get('smart_water','SmartwaterController@showInfo');

Route::get('smart_info','SmartinfoController@showInfo');
