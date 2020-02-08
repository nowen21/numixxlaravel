@extends('layouts.adminlte')
@section('styles')
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h1 style="text-align: center">Ver Servicio</h1>
        </div>

        <div class="panel-body">
          <div class="form-group">
            <strong class="control-label col-sm-2">Nombre:</strong>
            <div class="col-sm-4">
              {{$servicio->nombre}}
            </div> 
            <strong class="control-label col-sm-2">Clínica:</strong>
            <div class="col-sm-4">
              {{$servicio->clinica->nombre}}
            </div> 
            <strong class="control-label col-sm-2">Estado:</strong>
            <div class="col-sm-4">
              {{$servicio->estado->nombre}}
            </div> 
          </div>           
        </div>
        <div class="panel-body">
          <div class="form-group">          
            <div class="col-sm-12">
              <a href="{{route('servicios.create')}}" class="btn btn-sm btn-primary pull-right" role="button">Nuenvo Servicio</a>
              <a href="{{route('servicios.index')}}" class="btn btn-sm btn-primary pull-right" role="button">Volver a Servicios</a>
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