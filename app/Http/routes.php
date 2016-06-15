<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

// Route::group(['middleware' => 'auth'], function () {
// 	Route::controller('/admin/service-master', 'Admin\ServiceMastersController');
// 	Route::get('/admin/equipment-master/list', 'Admin\EquipmentMastersController@getList');
// 	Route::controller('/profile', 'Main\ProfileController');
//  });

// Route::group(['middleware' => 'role:admin'], function () {
	Route::controller('/admin/home', 'Admin\HomeController');
 // }); 

// Route::group(['middleware' => 'role:dco'], function () {
// 	Route::controller('/dco/register','Dco\RegisterController');
// 	Route::controller('/dco/setting','Dco\SettingController');
//  });

// Route::group(['middleware' => 'role:dsa'], function () {
// 	Route::controller('/dsa/register','Dsa\RegisterController');
// 	Route::controller('/dsa/setting','Dsa\SettingController');
//  }); 
