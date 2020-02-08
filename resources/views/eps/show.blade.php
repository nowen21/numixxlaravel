@extends('layouts.adminlte')
@section('styles')
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h1 style="text-align: center">Ver EPS</h1>
        </div>
        <div class="panel-body">
          <div class="form-group">
            <strong class="control-label col-sm-2">Nombre:</strong>
            <div class="col-sm-4">
              {{$eps->nombre}}
            </div> 
            <strong class="control-label col-sm-2">Estado:</strong>
            <div class="col-sm-4">
              {{$estado}}
            </div> 
          </div>
        </div>
        <div class="panel-body">
          <div class="form-group">          
            <div class="col-sm-12">
              <a href="{{route('eps.create')}}" class="btn btn-sm btn-primary pull-right" role="button">Nuenva EPS</a>
              <a href="{{route('eps.index')}}" class="btn btn-sm btn-primary pull-right" role="button">Volver a EPSs</a>
            </div>           
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('scripts')
@endsection