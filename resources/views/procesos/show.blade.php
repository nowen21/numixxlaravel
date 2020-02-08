@extends('layouts.adminlte')

@section('styles')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h1 style="text-align: center">Ver Proceso</h1>
        </div>

        <div class="panel-body">
          <div class="form-group">
            {{ Form::label('formulacione_id','Lote') }} 
            <div class="radio">
              {{ $dataxxxx['proceso']->formulacione_id}}       
            </div>
          </div>
          <div class="form-group">
            {{ Form::label('','Coloración Normal') }} 
            <div class="radio">
              <?php echo $dataxxxx['proceso']->coloraci == 1 ? 'SI' : 'NO'; ?>
            </div>
          </div>
          <div class="form-group">
            {{ Form::label('','Ausencia de Partículas') }} 
            <div class="radio">
              <?php echo $dataxxxx['proceso']->ausepart == 1 ? 'SI' : 'NO'; ?>
            </div>
          </div>
          <div class="form-group">
            {{ Form::label('ausefuga','Ausencia de Fugas') }} 
            <div class="radio">
              <?php echo $dataxxxx['proceso']->ausefuga == 1 ? 'SI' : 'NO'; ?>
            </div>
          </div>
          <div class="form-group">
            {{ Form::label('ausemise','Ausencia de Miselas/Integridad en Emulsión') }} 
            <div class="radio">
              <?php echo $dataxxxx['proceso']->ausemise == 1 ? 'SI' : 'NO'; ?>
            </div>
          </div>
          <div class="form-group">
            {{ Form::label('estado_id','Estado') }} 
            <div class="radio">
              {{ $dataxxxx['proceso']->estado->nombre}} 
            </div>
          </div>
        </div>
        <div class="panel-body">
          <div class="form-group">          
            <div class="col-sm-12">
              <a href="{{route('procesos.create')}}" class="btn btn-sm btn-primary pull-right" role="button">Nuevo Proceso</a>
              <a href="{{route('procesos.index')}}" class="btn btn-sm btn-primary pull-right" role="button">Volver a Procesos</a>
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