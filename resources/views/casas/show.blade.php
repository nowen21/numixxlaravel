@extends('layouts.adminlte')
@section('styles')
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h1 style="text-align: center">Ver CASA</h1>
        </div>

        <div class="panel-body">
          <div class="form-group">
            <strong class="control-label col-sm-2">Nombre:</strong>
            <div class="col-sm-4">
              {{$casa->nombre}}
            </div>             
            <strong class="control-label col-sm-2">ID campo:</strong>
            <div class="col-sm-4">
              {{$casa->nameidxx}}
            </div> 
            <strong class="control-label col-sm-2">Orden:</strong>
            <div class="col-sm-4">
              Posición {{$casa->ordecasa}}
            </div>             
            <strong class="control-label col-sm-2">Estado:</strong>
            <div class="col-sm-4">
              {{$estado}}
            </div> 
          </div>
        </div>
        <div class="panel-body">
          <div class="form-group">          
            <div class="col-sm-12">
              <a href="{{route('casas.create')}}" class="btn btn-sm btn-primary pull-right" role="button">Nuenva Casa</a>
              <a href="{{route('casas.index')}}" class="btn btn-sm btn-primary pull-right" role="button">Volver a Casas</a>
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