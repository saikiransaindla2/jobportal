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
  @if($applicants)
    @foreach($applicants as $applicant)

    <tr>
      <td>{{$applicant->id}}</td>
      <td>{{$applicant->name}}</td> 
      <td>{{$applicant->mobile}}</td>
      <td>{{$applicant->address}}</td>
      <td>{{$applicant->gender}}</td>
      <td>{{$applicant->education}}</td>
    </tr>
    @endforeach
  @endif
</table>
@stop