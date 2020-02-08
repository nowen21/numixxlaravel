@extends('layouts.adminlte')
@section('styles')
@endsection
@section('content')
<div class="container">
  <div class="row">   
    <div class="panel panel-default">
      <div class="panel-heading">
        <h1 style="text-align: center">Ver Registro Invima</h1>
      </div>

      <div class="panel-body">

        <div class="form-group">
          <strong class="control-label col-sm-2">Registro Invima:</strong>
          <div class="col-sm-4">
            {{$dinvima->reginvim}}
          </div> 
          <strong class="control-label col-sm-2">Dispositivo Médico:</strong>
          <div class="col-sm-4">
            {{$dinvima->dmarca->dispmedico->nombgene}}
          </div> 
        </div>
        <div class="form-group">
          <strong class="control-label col-sm-2">Marca:</strong>
          <div class="col-sm-4">
            {{$dinvima->dmarca->nombcome}}
          </div> 
           <strong class="control-label col-sm-2">Estado:</strong>
          <div class="col-sm-4">
            {{$dinvima->estado->nombre}}
          </div>
        </div>
        
      </div>
      <div class="panel-body">
        <div class="form-group">          
          <div class="col-sm-12">
            <a href="{{route('dinvimas.create')}}" class="btn btn-sm btn-primary pull-right" role="button">Nuenvo Registro Invima</a>
            <a href="{{route('dinvimas.index')}}" class="btn btn-sm btn-primary pull-right" role="button">Volver a Registro Invima</a>
          </div>           
        </div>
      </div>

    </div>
  </div>
</div>
@endsection
@section('scripts')
@endsection