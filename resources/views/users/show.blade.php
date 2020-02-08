@extends('layouts.adminlte')
@section('styles')
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h1 style="text-align: center">Ver Usuario</h1>
        </div>
        <div class="panel-body">
          <div class="form-group">
            <strong class="control-label col-sm-2">Nombre:</strong>
            <div class="col-sm-4">
              {{$user->name}}
            </div> 
            <strong class="control-label col-sm-2">Email:</strong>
            <div class="col-sm-4">
              {{$user->email}}
            </div> 
          </div>
          <div class="form-group">
            <strong class="control-label col-sm-2">Ips:</strong>
            <div class="col-sm-4">  
              {{$clinica->nombre}}
            </div> 
            <strong class="control-label col-sm-2"></strong>
            <div class="col-sm-4">             
            </div> 
          </div>
        </div>
         <div class="panel-body">
          <div class="form-group">          
            <div class="col-sm-12">
              <a href="{{route('users.create')}}" class="btn btn-sm btn-primary pull-right" role="button">Nuenvo Usuario</a>
              <a href="{{route('users.index')}}" class="btn btn-sm btn-primary pull-right" role="button">Volver a Usuarios</a>
            </div>           
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('scripts')
@endsection