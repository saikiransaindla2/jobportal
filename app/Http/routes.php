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
    return view('applicants.index');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::resource('/applicants', 'ApplicantsController');

//Route::get('/saik', 'HomeController@showk');
//Route::get('/saikk', 'HomeController@showkk');

