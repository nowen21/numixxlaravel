@extends('layouts.adminlte')
@section('styles')
@endsection
@section('content')
<div class="container">
  <div class="row">   
    <div class="panel panel-default">
      <div class="panel-heading">
        <h1 style="text-align: center">Ver Dispositivo Médico</h1>
      </div>

      <div class="panel-body">

        <div class="form-group">  
         
          <strong class="control-label col-sm-2">Nombre Genérico:</strong>  
          <div class="col-sm-4">
            {{ $dispmedico->nombgene }} 
          </div>  
          <strong class="control-label col-sm-2">Concentración:</strong> 
          <div class="col-sm-4">
            {{ $dispmedico->concentr  }} 
          </div> 

        </div>
        <div class="form-group" > 
          <strong class="control-label col-sm-2">Unidad de Medida:</strong> 
          <div class="col-sm-4">
            {{ $dispmedico->unidmedi  }}     
          </div> 
          <strong class="control-label col-sm-2">Estado:</strong>
          <div class="col-sm-4">
            {{ $dispmedico->estado->nombre }} 
          </div>

        </div>
      </div>
      <div class="panel-body">
        <div class="form-group">          
          <div class="col-sm-12">
            <a href="{{route('dispositivos.create')}}" class="btn btn-sm btn-primary pull-right" role="button">Nuevo Dispositivo Médico</a>
            <a href="{{route('dispositivos.index')}}" class="btn btn-sm btn-primary pull-right" role="button">Volver a Dispositovos Médicos</a>
          </div>           
        </div>
      </div>

    </div>
  </div>
</div>
@endsection
@section('scripts')
@endsection