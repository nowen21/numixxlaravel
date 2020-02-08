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
        <div class="form-group" > 
          <strong class="control-label col-sm-2">Npt:</strong>
          <div class="col-sm-4">
            {{$medicamentonpt->npt->nombre}}
          </div> 
          <strong class="control-label col-sm-2">Medicamento:</strong>
          <div class="col-sm-4">
            {{$medicamentonpt->medicamento->nombgene}}
          </div> 

        </div>
        <div class="form-group">  
          <strong class="control-label col-sm-2">Rango Desde:</strong>
          <div class="col-sm-4">
            {{$medicamentonpt->randesde}}
          </div> 
          <strong class="control-label col-sm-2">Rango Hasta:</strong> 
          <div class="col-sm-4">
            {{$medicamentonpt->ranhasta}}
          </div> 
        </div>
        <div class="form-group" >  
          <strong class="control-label col-sm-2">Unidad del Rango:</strong>
          <div class="col-sm-4">
            {{$medicamentonpt->rangunid}}
          </div> 
          <strong class="control-label col-sm-2">Estado:</strong>
          <div class="col-sm-4">
            {{$medicamentonpt->estado->nombre}}
          </div> 
        </div>
      </div>
      <div class="panel-body">
        <div class="form-group">          
          <div class="col-sm-12">
            <a href="{{route('medicamentonpts.create')}}" class="btn btn-sm btn-primary pull-right" role="button">Nuenvo Medicamnto Npt</a>
            <a href="{{route('medicamentonpts.index')}}" class="btn btn-sm btn-primary pull-right" role="button">Volver a Medicamentos Npt</a>
          </div>           
        </div>
      </div>

    </div>
  </div>
</div>
@endsection
@section('scripts')
@endsection