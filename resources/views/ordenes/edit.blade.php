
@extends('layouts.adminlte')
@section('styles')
@endsection
@section('content')
<div class="container">
  <div class="row">

    <div class="panel panel-default">
      <div class="panel-heading">
        <h1 style="text-align: center">Editar Orden de producción</h1>
      </div>
      <div class="panel-body">
        {!!Form::model($ordene,['route'=>['ordenes.update',$ordene->id],'method'=>'PUT'])!!}
        @include('ordenes.partials.form')
        {!!Form::close()!!}
      </div>
    </div>
  </div>
</div>
@endsection
@section('scripts')
@endsection





