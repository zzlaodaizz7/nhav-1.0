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
Route::group(['prefix'=>'view'],function(){
	Route::resource('product','product_controller');
	Route::resource('agency','agency_controller');
	Route::resource('order','order_controller');
	Route::resource('statistics','statistics_controller');
});
Route::get('agency/{agency_id}','ajax_controller@loadagency');
Route::get('agencystatistics/{agency_id}','ajax_controller@loadagencystastitic');