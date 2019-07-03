<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
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
        return view('companies.index');
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_id=Auth::user()->id;
        $company_id=User::find($user_id)->company->id;
        $applications=Company::find($company_id)->application;
        //
        return view('companies.show',compact('applications'));
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
