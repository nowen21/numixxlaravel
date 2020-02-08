@extends('layouts.adminlte')

@section('styles')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h1 style="text-align: center">Ver Rol</h1>
        </div>

        <div class="panel-body">
          <div class="form-group">
            <strong class="control-label col-sm-2">Rol:</strong>
            <div class="col-sm-4">
              {{$role->name}}
            </div> 
            <strong class="control-label col-sm-2">Slug:</strong>
            <div class="col-sm-4">
              {{$role->slug}}
            </div> 
          </div>
          <div class="form-group">
            <strong class="control-label col-sm-2">Descripción:</strong>
            <div class="col-sm-10">
              {{$role->description}}
            </div> 
          </div>
        </div>
         <div class="panel-body">
          <div class="form-group">          
            <div class="col-sm-12">
              <a href="{{route('roles.create')}}" class="btn btn-sm btn-primary pull-right" role="button">Nuenvo Rol</a>
              <a href="{{route('roles.index')}}" class="btn btn-sm btn-primary pull-right" role="button">Volver a Roles</a>
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