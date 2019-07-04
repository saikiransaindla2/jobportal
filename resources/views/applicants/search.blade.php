@extends('layouts.admin')




@section('content')


    <h1>Hi {{Auth::user()->name}} : Search for a Job Opening</h1>


    {!! Form::open(['method'=>'POST', 'action'=> 'ApplicantsController@search','files'=>true]) !!}


      <div class="form-group">
             {!! Form::label('search_jobs', 'Search for Jobs:') !!}
             {!! Form::text('search_jobs', null, ['class'=>'form-control'])!!}
       </div>

         <div class="form-group">
            {!! Form::submit('Search', ['class'=>'btn btn-primary']) !!}
         </div>

    {!! Form::close() !!}

@if($jobs)
    <table class='table'>
  <tr>
    <th>Id</th>
    <th>Job Designation</th> 
    <th>Company Name</th>
    <th>Experience Required</th>
    <th>Tech</th>
    <th>Pay Scale</th>
    <th>Created</th>
    <th>Updated</th>
    <th>Apply</th>
  </tr>
   @if($jobs)
    @foreach($jobs as $job)

    <tr>
      <td>{{$job->id}}</td>
      <td>{{$job->job_name}}</td> 
      <td>{{App\AvailableJob::find($job->id)->company->name}}</td> 
      <td>{{$job->experience}}</td>
      <td>{{$job->tech}}</td>
      <td>{{$job->pay_scale}}</td>
      <td>{{$job->created_at->diffForHumans()}}</td>
      <td>{{$job->updated_at->diffForHumans()}}</td>
      @if(App\Applicant::find(App\User::find(Auth::user()->id)->applicant->id)->availablejob->find($job->id) === null)
      <td><a href="/applicants/apply/{{$job->id}}/2">Apply</td>
      @else
      <td>Applied</td>
      @endif
    </tr>
    @endforeach
  @endif 
</table> 

@else
    <h3>No results found</h3>
@endif



 @stop