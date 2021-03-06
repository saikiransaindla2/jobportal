@extends('layouts.admin')
<style>
.button {
    background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
</style>
@section('content')


    <h1>Hi {{Auth::user()->name}} : Jobs Applied</h1>
    
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
      <td><a href="/applicants/apply/{{$job->id}}/1">Apply</td>
      @else
      <td>Applied</td>
      @endif
    </tr>
    @endforeach
  @endif 
</table> 

 @stop