@extends('layouts.admin')




@section('content')


    <h1>Hi {{Auth::user()->name}} : Please provide additional Details</h1>


     {!! Form::open(['method'=>'POST', 'action'=> 'ApplicantsController@storeDetails','files'=>true]) !!}


      <div class="form-group">
             {!! Form::label('mobile', 'Mobile No:') !!}
             {!! Form::text('mobile', null, ['class'=>'form-control'])!!}
       </div>


       <div class="form-group">
        {!! Form::label('address', 'Address:') !!}
        {!! Form::text('address', null, ['class'=>'form-control'])!!}
       </div>

       <div class="form-group">
        {!! Form::label('gender', 'Gender:') !!}
        {!! Form::text('gender', null, ['class'=>'form-control'])!!}
       </div>

       <div class="form-group">
        {!! Form::label('education', 'Education:') !!}
        {!! Form::text('education', null, ['class'=>'form-control'])!!}
       </div>

         <div class="form-group">
            {!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}
         </div>

       {!! Form::close() !!}


    



 @stop