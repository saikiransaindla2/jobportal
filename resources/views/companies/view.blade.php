@extends('layouts.admin')




@section('content')


    <h1>Hi {{Auth::user()->name}} : Find below the Applications Received</h1>

    <!--{{
        $user_id=Auth::user()->id;
        $company_id=User::find($user_id)->company->id;
        $applications=Company::find($company_id)->application;


    }}
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
      <td>{{$app->user_id}}</td>
      <td>{{$app->app_status}}</td>
      <td>{{$app->created_at->diffForHumans()}}</td>
      <td>{{$app->updated_at->diffForHumans()}}</td>
    </tr>
    @endforeach
  @endif 
</table> -->



 @stop