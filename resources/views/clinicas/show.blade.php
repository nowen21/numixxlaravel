@extends('layouts.adminlte')
@section('styles')
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h1 style="text-align: center">Ver Clínica</h1>
        </div>

        <div class="panel-body">
          {!!Form::model($clinica)!!}
          <div class="form-group">
            <strong class="control-label col-sm-2">Nit:</strong>
            <div class="col-sm-4">
              {{$clinica->nit}}
            </div> 
            <strong class="control-label col-sm-2">Nombre:</strong>
            <div class="col-sm-4">
              {{$clinica->nombre}}
            </div> 
          </div>
          <div class="form-group">
            <strong class="control-label col-sm-2">Teléfono:</strong>
            <div class="col-sm-4">
              {{$clinica->telefono}}
            </div> 
            <strong class="control-label col-sm-2">Estado:</strong>
            <div class="col-sm-4">
              {{$estado}}
            </div> 
          </div>  
          <div class="form-group" style="padding-right: 0px"> 
            <hr>
            <h3>Lista de Medicamentos</h3>
            <ul class="list-unstyled">
              @foreach($medicame as $medicamento)
              <li>
                <label>
                  {{Form::checkbox('medicamentos[]',$medicamento->id,null)}}
                  {{$medicamento->nombgene}}

                </label>
              </li>
              @endforeach
            </ul>
          </div>
          {!!Form::close()!!}
        </div>
        <div class="panel-body">
          <div class="form-group">          
            <div class="col-sm-12">
              <a href="{{route('clinicas.create')}}" class="btn btn-sm btn-primary pull-right" role="button">Nuenva Clínica</a>
              <a href="{{route('clinicas.index')}}" class="btn btn-sm btn-primary pull-right" role="button">Volver a Clínicas</a>
            </div>           
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('scripts')
@endsection