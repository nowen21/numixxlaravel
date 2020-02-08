@extends('layouts.adminlte')
@section('styles')
@endsection
@section('content')
<div class="container">
  <div class="row">   
    <div class="panel panel-default">
      <div class="panel-heading">
        <h1 style="text-align: center">Ver Marca</h1>
      </div>

      <div class="panel-body">

        <div class="form-group">
          <strong class="control-label col-sm-2">Medicamento:</strong>
          <div class="col-sm-4">
            {{$marca->medicamento->nombgene}}
          </div> 
          <strong class="control-label col-sm-2">Marca:</strong>
          <div class="col-sm-4">
            {{$marca->marcaxxx}}
          </div> 
        </div>
        <div class="form-group">
          <strong class="control-label col-sm-2">Nombre Comercial:</strong>
          <div class="col-sm-4">
            {{$marca->nombcome}}
          </div> 
          <strong class="control-label col-sm-2">Osmolaridad:</strong>
          <div class="col-sm-4">
            {{$marca->osmorali}}
          </div> 
        </div>
        <div class="form-group">
          <strong class="control-label col-sm-2">Peso Específico:</strong>
          <div class="col-sm-4">
            {{$marca->pesoespe}}
          </div> 
          <strong class="control-label col-sm-2">Forma Farmaceútica:</strong>
          <div class="col-sm-4">
            {{$marca->formfarm}}
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
            <a href="{{route('marcas.create')}}" class="btn btn-sm btn-primary pull-right" role="button">Nueva Marca</a>
            <a href="{{route('marcas.index')}}" class="btn btn-sm btn-primary pull-right" role="button">Volver a Marcas</a>
          </div>           
        </div>
      </div>

    </div>
  </div>
</div>
@endsection
@section('scripts')
@endsection