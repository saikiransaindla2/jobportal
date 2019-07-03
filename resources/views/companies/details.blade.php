@extends('layouts.admin')




@section('content')


    <h1>Hi {{Auth::user()->name}} : Please provide additional Details</h1>


     {!! Form::open(['method'=>'POST', 'action'=> 'CompaniesController@storeDetails','files'=>true]) !!}


      <div class="form-group">
             {!! Form::label('about', 'About') !!}
             {!! Form::text('about', null, ['class'=>'form-control'])!!}
       </div>


       <div class="form-group">
        {!! Form::label('address', 'Address:') !!}
        {!! Form::text('address', null, ['class'=>'form-control'])!!}
       </div>

       <div class="form-group">
        {!! Form::label('contact', 'Contact:') !!}
        {!! Form::text('contact', null, ['class'=>'form-control'])!!}
       </div>

         <div class="form-group">
            {!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}
         </div>

       {!! Form::close() !!}


    



 @stop