<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AvailableJob;
use Auth;
use App\User;
use App\Applicant;
use App\Http\Requests;

class ApplicantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('applicants.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('applicants.create');
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
        $input['company_id']=Auth::user()->id;
        //return $input;
        AvailableJob::create($input);

        return redirect('/applicants');
        //echo $input;
    }

    public function details()
    {
        return view('applicants/details');
    }
    
    public function storeDetails(Request $request)
    {
        $input=$request->all();
        $user=Auth::user();
        //$user_id=->id;
        $input['user_id']=$user->id;
        $input['name']=$user->name;
        //return $input;
        Applicant::create($input);

        return redirect('/applicants');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $users=User::find($id)->applicant->all();
        //return $users;
        return view('applicants.show',compact('users'));
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
