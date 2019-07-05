<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Applicant;
use App\Company;
use App\User;
use Auth;

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
        //return view('home');
        if(Auth::user()->type === 'Company')
        {
            $user=User::find(Auth::user()->id)->company;
            $jobs=Company::find($user->id)->availablejob;

        return view('companies.index',compact('jobs'));
        }
        else
        return view('applicants.index');

    }
    
}
