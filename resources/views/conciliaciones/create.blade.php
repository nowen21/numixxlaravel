@extends('layouts.adminlte')
@section('styles')
@endsection
@section('content')
<div class="container">  
  <div  class="row">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h1 style="text-align: center">Crear Conciliación</h1>
      </div>

      <div class="panel-body">
        {!!Form::open(['route'=>'conciliaciones.store','id'=>'formdisp'])!!}
        @include('conciliaciones.partials.form')
        {!!Form::close()!!}
      </div>
    </div>
  </div>
</div>
@endsection
@section('scripts')
@endsection