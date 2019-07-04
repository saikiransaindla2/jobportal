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

use App\User;
use App\AvailableJob;

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');



//////For redirecting from login or register
Route::get('/diverge', function(){
    $user=Auth::user();
    if($user->type === 'Applicant')
    {
        $id=$user->id;
        if(User::find($id)->applicant === null)
        return redirect('/applicants/details');
        else
        return redirect('/applicants');

    }
    else
    {
        $id=$user->id;
        if(User::find($id)->company === null)
        return redirect('/companies/details');
        else
        return redirect('/companies');
    }
});
Route::post('/companies/storeDetails','CompaniesController@storeDetails');
Route::get('/companies/details','CompaniesController@details');
Route::get('/companies/view', 'CompaniesController@view');
Route::get('/companies/final/{id}', function($id){

    $applicants=AvailableJob::find($id)->applicant;
    //return $applicants;
    
    return view('companies/final',compact('applicants'));
});

Route::get('/applicants/viewjobs', 'ApplicantsController@viewjobs');
Route::get('/applicants/apply/{id}','ApplicantsController@apply');
Route::post('/applicants/storeDetails','ApplicantsController@storeDetails');
Route::get('/applicants/details','ApplicantsController@details');

Route::resource('/applicants', 'ApplicantsController');
Route::resource('/companies', 'CompaniesController');




//Route::get('/saik', 'HomeController@showk');
//Route::get('/saikk', 'HomeController@showkk');

