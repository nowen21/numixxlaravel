@extends('layouts.adminlte')
@section('styles')
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h1 style="text-align: center">Editar Clínica Rango</h1>
        </div>
        <div class="panel-body">
          {!!Form::model($clinicarango,['route'=>['clinicarangos.update',$clinicarango->id],'method'=>'PUT'])!!}
          @include('clinicarangos.partials.form')
          {!!Form::close()!!}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('scripts')
@endsection