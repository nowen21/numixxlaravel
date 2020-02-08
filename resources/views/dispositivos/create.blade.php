@extends('layouts.adminlte')
@section('styles')
@endsection
@section('content')
<div class="container">
  <div class="row">
    
      <div class="panel panel-default">
        <div class="panel-heading">
          <h1 style="text-align: center">Registrar Dispositivo Médico</h1>
        </div>

        <div class="panel-body">
          {!!Form::open(['route'=>'dispositivos.store'])!!}
          @include('dispositivos.partials.form')
          {!!Form::close()!!}
        </div>
      </div>
    </div>
  </div>

@endsection
@section('scripts')
@endsection