@extends('layouts.admin')

@section('content')
<h1>Hey dude, you're an AVENGER now!</h1>
<table class='table'>
  <tr>
    <th>Id</th>
    <th>Name</th> 
    <th>Mobile</th>
    <th>Address</th>
    <th>Gender</th>
    <th>Education</th>
  </tr>
  @if($users)
    @foreach($users as $user)

    <tr>
      <td>{{$user->id}}</td>
      <td>{{$user->name}}</td> 
      <td>{{$user->mobile}}</td>
      <td>{{$user->address}}</td>
      <td>{{$user->gender}}</td>
      <td>{{$user->education}}</td>
    </tr>
    @endforeach
  @endif
</table>
@stop