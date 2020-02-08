@extends('layouts.adminlte')
@section('styles')
@endsection
@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h1 style="text-align: center">Edición datos del paciente</h1>
        </div>
        <div class="panel-body">
          {!!Form::model($paciente,['route'=>['pacientes.update',$paciente->id],'method'=>'PUT','class'=>'form-vertical'])!!}
          @include('pacientes.partials.form')
          {!!Form::close()!!}
          <div class="form-group">          
                   
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
