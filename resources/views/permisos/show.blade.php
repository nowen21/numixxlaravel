@extends('layouts.adminlte')
@section('styles')
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h1 style="text-align: center">Ver Permiso</h1>
        </div>

        <div class="panel-body">
          <div class="form-group">
            <strong class="control-label col-sm-2">Permiso:</strong>
            <div class="col-sm-4">
              {{$permission->name}}
            </div> 
            <strong class="control-label col-sm-2">Rota Amigable:</strong>
            <div class="col-sm-4">
              {{$permission->slug}}
            </div> 
          </div>
          <div class="form-group">
            <strong class="control-label col-sm-2">Descripción:</strong>
            <div class="col-sm-10">
              {{$permission->description}}
            </div> 
          </div>
        </div>
        <div class="panel-body">
          <div class="form-group">          
            <div class="col-sm-12">
              <a href="{{route('permisos.create')}}" class="btn btn-sm btn-primary pull-right" role="button">Nuenvo Permiso</a>
              <a href="{{route('permisos.index')}}" class="btn btn-sm btn-primary pull-right" role="button">Volver a Permisos</a>
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