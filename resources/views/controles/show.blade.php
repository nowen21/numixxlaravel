@extends('layouts.adminlte')
@section('styles')
@endsection
@section('content')
<div class="container">
  <div class="row">   
    <div class="panel panel-default">
      <div class="panel-heading">
        <h1 style="text-align: center">Ver Orden de producción</h1>
      </div>
      <div class="panel-body">
        <div class="form-group"> 
          {{ Form::label('ordeprod','Orden de producción:',['class' => 'control-label col-sm-2']) }}  
          <div class="col-sm-4">
            {{ $ordene->ordeprod}} 
          </div>
          {{ Form::label('observac','Observaciones:',['class' => 'control-label col-sm-2']) }}  
          <div class="col-sm-4">
            {{ $ordene->observac}} 
          </div> 
        </div>
      </div>
      <div class="panel-body">
        <div class="form-group">          
          <div class="col-sm-12">
            <a href="{{route('ordenes.index')}}" class="btn btn-sm btn-primary pull-right" role="button">Volver a Órdenes</a>
          </div>           
        </div>
      </div>

    </div>
  </div>
</div>
@endsection
@section('scripts')
@endsection