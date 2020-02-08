@extends('layouts.adminlte')
@section('styles')
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h1 style="text-align: center">Edición Rol</h1>
        </div>

        <div class="panel-body">
          {!!Form::model($role,['route'=>['roles.update',$role->id],'method'=>'PUT'])!!}
          @include('roles.partials.form')
          {!!Form::close()!!}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('scripts')
@endsection