@extends('layouts.adminlte')
@section('styles')
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h1 style="text-align: center">Ver Dispensación</h1>
      </div>
      
      <style>
        .negrita{
          font-weight: bold;
        }
      </style>
      <div class="panel-body">
        <div class="form-group">
          <div class="col-sm-2 negrita" style=" font">
            Producto:
          </div>         
          <div class="col-sm-4">
            {{ $cabecera->producto }}
          </div>
          <div class="col-sm-2 negrita">
            Fecha:
          </div>  
          <div class="col-sm-4">
            {{ $cabecera->fechaxxx }} 
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-2 negrita">
            OP:
          </div> 

          <div class="col-sm-4">
            {{ $cabecera->opxxxxxx}} 
          </div>
          <div class="col-sm-2 negrita">
            Estado:
          </div> 
          <div class="col-sm-4">
            {{ $estado }} 
          </div>
        </div>
        <div class="form-group" >
        <div class="col-sm-12" style="margin-top: 10px">
          <table class="table table-hover table-bordered table-striped datatable" style="width:100%">
            @include('dispensaciones.cuerpo')
          </table>
          
        </div>

      </div>
    </div>
    <div class="panel-body">
      <div class="form-group">          
        <div class="col-sm-12">
          <a href="{{route('dispensaciones.create')}}" class="btn btn-sm btn-primary pull-right" role="button">Nueva Dispensación</a>
          <a href="{{route('dispensaciones.index')}}" class="btn btn-sm btn-primary pull-right" role="button">Volver a Dispensaciones</a>
        </div>           
      </div>
    </div>

  </div>
</div>
</div>
@endsection
@section('scripts')
@endsection