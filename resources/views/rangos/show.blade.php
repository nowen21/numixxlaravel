@extends('layouts.adminlte')
@section('styles')
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h1 style="text-align: center">Ver Rango</h1>
        </div>

        <div class="panel-body">
          {!!Form::model($rango)!!}
          <div class="form-group">
            <strong class="control-label col-sm-2">Rango Incio:</strong>
            <div class="col-sm-4">
              {{$rango->ranginic}}
            </div> 
            <strong class="control-label col-sm-2">Rango Fin:</strong>
            <div class="col-sm-4">
              {{$rango->rangfina}}
            </div> 
          </div>
          <div class="form-group">
            <strong class="control-label col-sm-2">Estado:</strong>
            <div class="col-sm-4">
              {{$rango->estado->nombre}}
            </div> 
            
          </div>  
          {!!Form::close()!!}
        </div>
        <div class="panel-body">
          <div class="form-group">          
            <div class="col-sm-12">
              <a href="{{route('rangos.create')}}" class="btn btn-sm btn-primary pull-right anchoxxx" role="button">Nuenvo Rango</a>
              <a href="{{route('rangos.index')}}" class="btn btn-sm btn-primary pull-right anchoxxx" role="button">Volver a Rangos</a>
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