@extends('layouts.adminlte')
@section('styles')
@endsection
@section('content')
<div class="container">
  <div class="row">   
    <div class="panel panel-default">
      <div class="panel-heading">
        <h1 style="text-align: center">Ver Marca Disipositivo Médico</h1>
      </div>

      <div class="panel-body">

        <div class="form-group">
          <strong class="control-label col-sm-2">Dispositivo Médico:</strong>
          <div class="col-sm-4">
            {{$dmarca->dispmedico->nombgene}}
          </div> 
          <strong class="control-label col-sm-2">Marca:</strong>
          <div class="col-sm-4">
            {{$dmarca->marcaxxx}}
          </div> 
          
        </div>
        <div class="form-group">
          <strong class="control-label col-sm-2">Nombre Comercial:</strong>
          <div class="col-sm-4">
            {{$dmarca->nombcome}}
          </div>
          <strong class="control-label col-sm-2">Osmolaridad:</strong>
          <div class="col-sm-4">
            {{$dmarca->osmorali}}
          </div> 
        </div>
        <div class="form-group">
          <strong class="control-label col-sm-2">Peso Específico:</strong>
          <div class="col-sm-4">
            {{$dmarca->pesoespe}}
          </div> 
           <strong class="control-label col-sm-2">Forma Farmaceútica:</strong>
          <div class="col-sm-4">
            {{$dmarca->formfarm}}
          </div> 
        </div>
        <div class="form-group"> 
          <strong class="control-label col-sm-2">Estado:</strong>
          <div class="col-sm-4">
            {{$dmarca->estado->nombre}}
          </div> 
        </div>
      </div>
      <div class="panel-body">
        <div class="form-group">          
          <div class="col-sm-12">
            <a href="{{route('dmarcas.create')}}" class="btn btn-sm btn-primary pull-right" role="button">Nueva Marca</a>
            <a href="{{route('dmarcas.index')}}" class="btn btn-sm btn-primary pull-right" role="button">Volver a Marcas</a>
          </div>           
        </div>
      </div>

    </div>
  </div>
</div>
@endsection
@section('scripts')
@endsection