
@extends('layouts.app')
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
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    
                <!-- <a href='companies/create' class="button">Update Profile Details</a> -->
                <a href='companies/create' class="button">Add Job Openings</a>
                <!-- <a href='companies/1' class="button">View Job Applications</a> -->


                </div>
            </div>
        </div>
        <div class="col-md-10 col-md-offset-1">
        <h1>Added Job Openings:</h1></br>
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
                <th>Applications</th>
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
                <td><a href="/companies/final/{{$job->id}}">View</td>
                </tr>
                @endforeach
            @endif
        </div>
    </div>
</div>
@endsection
