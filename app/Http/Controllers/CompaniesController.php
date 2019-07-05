<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Applicant;
use App\AvailableJob;
use App\Http\Requests;
use App\User;
use App\Company;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user=User::find(Auth::user()->id)->company;
        //return $user;

        $jobs=Company::find($user->id)->availablejob;
        //return $jobs;
        return view('companies.index',compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('companies.create');
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        //
        $input=$request->all();
        $user_id=Auth::user()->id;
        $company_id=User::find($user_id)->company->id;
        $input['company_id']=$company_id;
        //return $input;
        AvailableJob::create($input);

        return redirect('/companies');
    }

    public function details()
    {
        return view('companies/details');
    }

    public function storeDetails(Request $request)
    {
        $input=$request->all();
        $user=Auth::user();
        //$user_id=->id;
        $input['user_id']=$user->id;
        $input['name']=$user->name;
        //return $input;
        Company::create($input);

        return redirect('/companies');
    }

    public function updateStatus(Request $request, $id, $idd)
    {
        $job = Applicant::find($id)->availablejob->find($idd);
        $job->pivot->update(['status'=>$request->status]);
        $job->save();
        return redirect('/companies/final/'.$idd);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        ////Gotta delete this since applications table is deleted
        /*$user_id=Auth::user()->id;
        $company_id=User::find($user_id)->company->id;
        $applications=Company::find($company_id)->application;
        //
        if($applications)
        return view('companies.show',compact('applications'));
        return view('companies.index');*/
    }
    public function view()
    {
        //
        return view('companies.view');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
