@extends('layouts.adminlte')
@section('styles')
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h1 style="text-align: center">Ver datos del paciente</h1>
        </div>
        <div class="panel-body">
          <div class="form-group">
            <strong class="control-label col-sm-2">Registro:</strong>
            <div class="col-sm-4">
              {{$paciente->registro}}
            </div> 
            <strong class="control-label col-sm-2">Identificación:</strong>
            <div class="col-sm-4">
              {{$paciente->cedula}}
            </div> 
          </div>
          <div class="form-group">
            <strong class="control-label col-sm-2">Nombres:</strong>
            <div class="col-sm-4">
              {{$paciente->nombres}}
            </div> 
            <strong class="control-label col-sm-2">Apellidos:</strong>
            <div class="col-sm-4">
              {{$paciente->apellidos}}
            </div> 
          </div>
          <div class="form-group">
            <strong class="control-label col-sm-2">Peso:</strong>
            <div class="col-sm-4">
              {{$paciente->peso}}
            </div> 
            <strong class="control-label col-sm-2">Género:</strong>
            <div class="col-sm-4">
              {{$paciente->genero->nombre}}
            </div> 
          </div>
          <div class="form-group">
            <strong class="control-label col-sm-2">Eps:</strong>
            <div class="col-sm-4">
              {{$paciente->eps->nombre}}
            </div> 
            <strong class="control-label col-sm-2">Npt:</strong>
            <div class="col-sm-4">
              {{$paciente->npt->nombre}}
            </div> 
          </div>
          <div class="form-group">
            <strong class="control-label col-sm-2">Cama:</strong>
            <div class="col-sm-4">
              {{$paciente->cama}}
            </div> 
            <strong class="control-label col-sm-2">Servicio:</strong>
            <div class="col-sm-4">
              {{$paciente->servicio->nombre}}
            </div>            
          </div>
          <div class="form-group">
             <strong class="control-label col-sm-2">Edad:</strong>
            <div class="col-sm-4">
              {{$paciente->edad}}
            </div> 
            <strong class="control-label col-sm-2">Clínica:</strong>
            <div class="col-sm-4">
              {{$paciente->clinica->nombre}}
            </div>             
          </div>
          <div class="form-group">
            <strong class="control-label col-sm-2">Departamento:</strong>
            <div class="col-sm-4">
              {{$paciente->municipio->departamento->nombre}}
            </div> 
            <strong class="control-label col-sm-2">Municipio:</strong>
            <div class="col-sm-4">
              {{$paciente->municipio->nombre}}
            </div> 
          </div>
          <div class="form-group">
            <strong class="control-label col-sm-2">Estado:</strong>
            <div class="col-sm-10">
              {{$paciente->estado->nombre}}
            </div> 
          </div>
          <div class="form-group" style="padding-top: 20px">
            <a href="{{route('pacientes.create')}}" class="btn btn-sm btn-primary pull-right" role="button">Nuevo Registro</a>  
            <a href="{{route('pacientes.index')}}" class="btn btn-sm btn-primary pull-right" role="button">Volver a Pacientes</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection