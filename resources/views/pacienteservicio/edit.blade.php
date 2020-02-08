@extends('layouts.adminlte')
@section('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.7/css/select.dataTables.min.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection
@section('content')

<div class="container">
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h1 style="text-align: center">Asignar Clinica(s) al Paciente: {{$pacienteservicio->paciente->nombres}} {{$pacienteservicio->paciente->apellidos}}</h1>
      </div>
      <div class="panel-body">
        {!!Form::model($pacienteservicio,['route'=>['pacienteservicio.update',$pacienteservicio->id],'method'=>'PUT','class'=>'form-vertical'])!!}
        @include('pacienteservicio.partials.form')
        {!!Form::close()!!}
      </div>
    </div>
  </div>
</div>
@endsection
