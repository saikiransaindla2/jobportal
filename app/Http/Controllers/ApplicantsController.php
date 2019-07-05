<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AvailableJob;
use Auth;
use App\User;
use App\Applicant;
use App\Http\Requests;
use App\Resume;

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
    public function apply($id,$idd)
    {
        $applicant=User::find(Auth::user()->id)->applicant;
        $job=AvailableJob::find($id);
        $applicant->availablejob()->save($job);
        if($idd=1)
        return redirect('/applicants/1');//////can directly be sent to the view.do it later
        else{
            return redirect('/applicants/search');
        }
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
        if($file = $request->file('resume_id')){
            $path = time() . $file->getClientOriginalName();
            $file->move('resumes', $path );
            $resume = Resume :: create(['file'=>$path]);
            $input['resume_id'] = $resume->id;
        }

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
        
        //$users=User::find($id)->applicant->all();
        //return $users;
        //return view('applicants.show',compact('users'));

        //$user_id=Auth::user()->id;
        //$company_id=User::find($user_id)->company->id;
        //$applications=Company::find($company_id)->application;
        $jobs=AvailableJob::all();
        if($id === 2)
        {
            //$jobs=AvailableJob::all();
        //
        //if($jobs)
        return view('applicants.view',compact('jobs'));
        //return view('applicants.index');
        }
        else
        {
            
            return view('applicants/search',compact('jobs'));
        }
    }
    public function search(Request $request)
    {
        $title=$request['search_jobs'];
        // return $title;
        $jobs=AvailableJob::where('job_name','LIKE', '%'.$title.'%')->get();
        //return $jobs;
        return view('applicants/search',compact('jobs'));
    }
    public function viewjobs()
    {
        $user=Auth::user();
        $applicant_id=$user->applicant->id;
        $jobs=Applicant::find($applicant_id)->availablejob;

        //return $jobs;

        if($jobs)
        return view('applicants.viewjobs',compact('jobs','applicant_id'));
        return view('applicants.index');
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
