@extends('layouts.adminlte')
@section('styles')
@endsection
@section('content')
<div class="container">
  <div class="row">   
    <div class="panel panel-default">
      <div class="panel-heading">
        <h1 style="text-align: center">Ver Lote</h1>
      </div>

      <div class="panel-body">

        <div class="form-group">
          <strong class="control-label col-sm-2">Fecha de Vencimieto:</strong>
          <div class="col-sm-4">
            {{$dlote->fechvenc}}
          </div> 
          <strong class="control-label col-sm-2">Registro Invima:</strong>
          <div class="col-sm-4">
            {{$invimaxx->reginvim}}
          </div> 
        </div>
        <div class="form-group">
          <strong class="control-label col-sm-2">Inventario:</strong>
          <div class="col-sm-4">
            {{$dlote->inventar}}
          </div> 
          <strong class="control-label col-sm-2">Lote:</strong>
          <div class="col-sm-4">
            {{$dlote->lotexxxx}}
          </div> 
        </div>
        <div class="form-group">
          <strong class="control-label col-sm-2">Estado:</strong>
          <div class="col-sm-4">
            {{$estadoxx}}
          </div> 
        </div>
      </div>
      <div class="panel-body">
        <div class="form-group">          
          <div class="col-sm-12">
            <a href="{{route('dlotes.create')}}" class="btn btn-sm btn-primary pull-right" role="button">Nuenvo Lote</a>
            <a href="{{route('dlotes.index')}}" class="btn btn-sm btn-primary pull-right" role="button">Volver a Lotes</a>
          </div>           
        </div>
      </div>

    </div>
  </div>
</div>
@endsection
@section('scripts')
@endsection