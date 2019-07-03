@extends('layouts.admin')

   


@section('content')


    <h1>Hi {{Auth::user()->name}} : Find below the Applications Received</h1>
    
    <table class='table'>
  <tr>
    <th>Id</th>
    <th>Job Id</th> 
    <th>Company Id</th>
    <th>User Id</th>
    <th>Status</th>
    <th>Created</th>
    <th>Updated</th>
  </tr>
   @if($applications)
    @foreach($applications as $app)

    <tr>
      <td>{{$app->id}}</td>
      <td>{{$app->job_id}}</td> 
      <td>{{$app->company_id}}</td>
      <td><a href="/applicants/{{$app->user_id}}">{{$app->user_id}}</td>
      <td>{{$app->app_status}}</td>
      <td>{{$app->created_at->diffForHumans()}}</td>
      <td>{{$app->updated_at->diffForHumans()}}</td>
    </tr>
    @endforeach
  @endif 
</table> 

 @stop