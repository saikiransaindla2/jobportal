@extends('layouts.admin')




@section('content')


    <h1>Hi {{Auth::user()->name}} : Create a Job Opening</h1>


     {!! Form::open(['method'=>'POST', 'action'=> 'ApplicantsController@store','files'=>true]) !!}


      <div class="form-group">
             {!! Form::label('job_name', 'Job Name:') !!}
             {!! Form::text('job_name', null, ['class'=>'form-control'])!!}
       </div>


       <div class="form-group">
        {!! Form::label('experience', 'Experience:') !!}
        {!! Form::text('experience', null, ['class'=>'form-control'])!!}
       </div>

       <div class="form-group">
        {!! Form::label('tech', 'Tech:') !!}
        {!! Form::text('tech', null, ['class'=>'form-control'])!!}
       </div>

       <div class="form-group">
        {!! Form::label('pay_scale', 'Pay Scale:') !!}
        {!! Form::text('pay_scale', null, ['class'=>'form-control'])!!}
       </div>




        

         <div class="form-group">
            {!! Form::submit('Create Opening', ['class'=>'btn btn-primary']) !!}
         </div>

       {!! Form::close() !!}


    



 @stop