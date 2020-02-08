@extends('layouts.adminlte')
@section('styles')
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h1 style="text-align: center">Ver Género</h1>
        </div>

        <div class="panel-body">
          <div class="form-group">
            <strong class="control-label col-sm-2">Nombre:</strong>
            <div class="col-sm-4">
              {{$genero->nombre}}
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
              <a href="{{route('generos.create')}}" class="btn btn-sm btn-primary pull-right" role="button">Nuenvo Género</a>
              <a href="{{route('generos.index')}}" class="btn btn-sm btn-primary pull-right" role="button">Volver a Géneros</a>
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