@extends('layouts.adminlte')
@section('styles')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection
@section('content')
<div class="container">
  <div class="row">
    
      <div class="panel panel-default">
        <div class="panel-heading">
          <h1 style="text-align: center">Registrar Lote</h1>
        </div>

        <div class="panel-body">
          {!!Form::open(['route'=>'lotes.store'])!!}
          @include('lotes.partials.form')
          {!!Form::close()!!}
        </div>
      </div>
    </div>
  </div>

@endsection
@section('scripts')
@endsection