
@extends('layouts.adminlte')
@section('styles')
@endsection
@section('content')
<div class="container">
  <div class="row">

    <div class="panel panel-default">
      <div class="panel-heading">
        <h1 style="text-align: center">Editar Medicamento</h1>
      </div>
      <div class="panel-body">
        {!!Form::model($medicamento,['route'=>['medicamentos.update',$medicamento->id],'method'=>'PUT'])!!}
        @include('medicamentos.partials.form')
        {!!Form::close()!!}
      </div>
    </div>
  </div>
</div>
@endsection
@section('scripts')
@endsection





