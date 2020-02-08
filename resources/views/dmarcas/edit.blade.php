
@extends('layouts.adminlte')
@section('styles')
@endsection
@section('content')
<div class="container">
  <div class="row">

    <div class="panel panel-default">
      <div class="panel-heading">
        <h1 style="text-align: center">Editar Marca Dispositivo Médico</h1>
      </div>
      <div class="panel-body">
        {!!Form::model($dmarca,['route'=>['dmarcas.update',$dmarca->id],'method'=>'PUT'])!!}
        @include('dmarcas.partials.form')
        {!!Form::close()!!}
      </div>
    </div>
  </div>
</div>
@endsection
@section('scripts')
@endsection





