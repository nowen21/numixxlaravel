@extends('layouts.adminlte')
@section('styles')
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h1 style="text-align: center">Ver Remisión</h1>
        </div>

        <div class="panel-body">
          {!!Form::model($remisione)!!}
          <div class="form-group">            
            <strong class="control-label col-sm-2">Clínica:</strong>
            <div class="col-sm-4">
              {{$remisione->clinica_rango->clinica->nombre}}
            </div> 
            <strong class="control-label col-sm-2">Rango:</strong>
            <div class="col-sm-4">
              {{$remisione->clinica_rango->rango->ranginic}}-{{$remisione->clinica_rango->rango->rangfina}}
            </div> 
          </div>
          <div class="form-group">
            <strong class="control-label col-sm-2">Estado:</strong>
            <div class="col-sm-4">
              {{$remisione->estado->nombre}}
            </div> 

          </div>  
          {!!Form::close()!!}
        </div>
        <div class="panel-body">
          <div class="form-group">          
            <div class="col-sm-12">
              <a href="{{route('remisiones.create')}}" class="btn btn-sm btn-primary pull-right anchoxxx" role="button">Nueva Remisión</a>
              <a href="{{route('remisiones.index')}}" class="btn btn-sm btn-primary pull-right anchoxxx" role="button">Volver a Remisiones</a>
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