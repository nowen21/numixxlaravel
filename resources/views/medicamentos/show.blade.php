@extends('layouts.adminlte')
@section('styles')
@endsection
@section('content')
<div class="container">
  <div class="row">   
    <div class="panel panel-default">
      <div class="panel-heading">
        <h1 style="text-align: center">Ver Medicamento</h1>
      </div>
      <div class="panel-body">
        <div class="form-group">  
         <strong class="control-label col-sm-2">Clínica:</strong> 
          <div class="col-sm-4">
           {{$medicamento->clinica->nombre}}
          </div>    
         <strong class="control-label col-sm-2">Casa:</strong> 
          <div class="col-sm-4">
           {{$medicamento->casa->nombre}}
          </div>  
        </div>
        <div class="form-group">
           <strong class="control-label col-sm-2">Nombre Genérico:</strong> 
          <div class="col-sm-4">
           {{$medicamento->nombgene}}
          </div>
          <strong class="control-label col-sm-2">Concentración:</strong>  
          <div class="col-sm-4">
            {{ $medicamento->concentr}} 
          </div> 
        </div>
        <div class="form-group" >  
          <strong class="control-label col-sm-2">Unidad de Medida:</strong> 
          <div class="col-sm-4">
            {{ $medicamento->unidmedi }}     
          </div> 
          <strong class="control-label col-sm-2">Estado:</strong>
          <div class="col-sm-4">
            {{ $medicamento->estado->nombre }} 
          </div> 
        </div>
      </div>
      <div class="panel-body">
        <div class="form-group">          
          <div class="col-sm-12">
            <a href="{{route('medicamentos.create')}}" class="btn btn-sm btn-primary pull-right" role="button">Nuenvo Medicamento</a>
            <a href="{{route('medicamentos.index')}}" class="btn btn-sm btn-primary pull-right" role="button">Volver a Medicamentos</a>
          </div>           
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('scripts')
@endsection