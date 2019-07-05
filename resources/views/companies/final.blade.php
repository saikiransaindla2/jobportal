@extends('layouts.admin')

@section('content')
<h1>Applications Received :</h1></br>
<table class='table'>
  <tr>
    <th>Id</th>
    <th>Name</th> 
    <th>Mobile</th>
    <th>Address</th>
    <th>Gender</th>
    <th>Education</th>
    <th>Resume</th>
    <th>Update Status</th>
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
      @if($applicant->resume)
      <td><a href="/resumes/{{$applicant->resume->file}}" download>Download Resume</td>
      @else
      <td>No resume uploaded</td>
      @endif
      <!-- <td><a href="/companies/updateStatus/{{$applicant->id}}/{{$idd}}">{{App\AvailableJob::find($idd)->applicant->find($applicant->id)->pivot->status}}</td>
     -->
     <td>{!! Form::open(['method'=>'PUT', 'action'=> ['CompaniesController@updateStatus',$applicant->id,$idd]]) !!}
     {!! Form::label('status', 'Status:') !!}
     {!! Form::text('status', App\AvailableJob::find($idd)->applicant->find($applicant->id)->pivot->status, ['class'=>'form-control'])!!}
     {!! Form::submit('Update', ['class'=>'btn btn-primary']) !!}
     {!! Form::close() !!}

     </td>

     </tr>
    @endforeach
  @endif
</table>
@stop