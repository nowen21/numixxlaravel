
@extends('layouts.adminlte')
@section('styles')
@endsection
@section('content')
<div class="container">
  <div class="row">

    <div class="panel panel-default">
      <div class="panel-heading">
        <h1 style="text-align: center">Editar Registro Sanitario</h1>
      </div>
      <div class="panel-body">
        {!!Form::model($minvima,['route'=>['invimas.update',$minvima->id],'method'=>'PUT'])!!}
        @include('invimas.partials.form')
        {!!Form::close()!!}
      </div>
    </div>
  </div>
</div>
@endsection
@section('scripts')
@endsection





