
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
                    
                <a href='companies/create' class="button">Update Profile Details</a>
                <a href='companies/create' class="button">Add Job Openings</a>
                <a href='companies/1' class="button">View Job Applications</a>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
