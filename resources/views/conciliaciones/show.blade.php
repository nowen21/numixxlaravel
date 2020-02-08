@extends('layouts.adminlte')
@section('styles')
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h1 style="text-align: center">Ver Conciliación</h1>
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
            {{ $cabecera->created_at }} 
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-2 negrita">
            OP:
          </div> 

          <div class="col-sm-4">
            {{ $cabecera->ordepres}} 
          </div>
          <div class="col-sm-2 negrita">
            Estado:
          </div> 
          <div class="col-sm-4">
            {{ $cabecera->estado->nombre }} 
          </div>
        </div>
        <div class="form-group" >
          <div class="col-sm-12" style="margin-top: 10px">
            <table class="table table-hover table-bordered table-striped datatable" style="width:100%; float: left">
              <thead>
                <tr style="font-size: 12px">             
                  <th style="width: 20%">DISPOSITIVO MÉDICO</th>
                  <th>LOTE</th>
                  <th>CANTIDAD CONSUMIDA</th>                  
                  <th>CANTIDAD ALISTADA</th>
                  <th>DIFERENCIA</th>
                </tr>
              </thead>
              <tbody>
                @foreach($medicame as $medicams)
                <tr style="font-size: 12px">
                  <td>{{$medicams['medicamd']}}</td>                  
                  <td>{{$medicams['lotexxxx']}}</td>                  
                  <td>                    
                    {{ $medicams['canco_di'] }}                     
                  </td>  
                  <td>                   
                    {{ $medicams['value_di'] }}          
                  </td> 
                  <td>                   
                    {{ $medicams['difer_di'] }}                     
                  </td> 
                </tr>
                @endforeach
              </tbody>
            </table>

          </div>

        </div>
      </div>
      <div class="panel-body">
        <div class="form-group">          
          <div class="col-sm-12">
            <a href="{{route('conciliaciones.index')}}" class="btn btn-sm btn-primary pull-right" role="button">Volver a Conciliaciones</a>
          </div>           
        </div>
      </div>

    </div>
  </div>
</div>
@endsection
@section('scripts')
@endsection