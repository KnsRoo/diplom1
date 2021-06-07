<?php

use Illuminate\Http\Request;

Route::group([
	'middleware' => ['api'],
	'prefix' => 'works'
], function(){
    Route::post('/add', 'WorkController@addWork')->name('api:works:add');

    Route::get('/get', 'WorkController@getWorks')->name('api:works:get');

});

Route::group([
	'middleware' => ['api'],
	'prefix' => 'requests'
], function(){
    Route::post('/add', 'RequestController@addRequest')->name('api:requests:add');

    Route::get('/user', 'RequestController@getMyRequests')->name('api:requests:get');

    Route::get('/all', 'RequestController@getRequests')->name('api:requests:all');

});

Route::group([
	'middleware' => ['api'],
	'prefix' => 'cars'
], function(){
    Route::post('/add', 'CarController@addCar')->name('api:cars:add');

    Route::get('/all', 'CarController@getCars')->name('api:cars:all');

    Route::get('/user', 'CarController@getMyCars')->name('api:cars:user');

});

Route::group([
	'middleware' => ['api'],
	'prefix' => 'user'
], function(){
    Route::post('/login', 'UserController@login')->name('api:user:login');

    Route::get('/get', 'UserController@getUser')->name('api:user:get');

    Route::post('/register', 'UserController@register')->name('api:user:register');

    Route::post('/logout', 'UserController@logout')->name('api:user:logout');

    Route::get('/admins', 'UserController@getAdmins')->name('api:user:admins');

    Route::get('/clients', 'UserController@getClients')->name('api:user:clients');

    Route::get('/mechanics', 'UserController@getMechanics')->name('api:user:mechanics');

    Route::post('/add', 'UserController@addMechanic')->name('api:mechanics:add');

});
