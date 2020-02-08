@extends('layouts.adminlte')

@section('styles')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h1 style="text-align: center">Ver Producto Terminado</h1>
        </div>
        <div class="panel-body">
          <div class="form-group">
            {{ Form::label('proceso_id','Proceso') }} 
            <div class="radio">
              {{  $dataxxxx['terminad']->proceso_id}} 
            </div>
          </div>
          <div class="form-group">
            {{Form::label('','Datos completos correctos en la etiqueta')}} 
            <div class="radio">
              <?php echo $dataxxxx['terminad']->completo == 1 ? 'SI' : 'NO'; ?> 
            </div>            
          </div>
          <div class="form-group">
            {{ Form::label('','Ausencia de Partículas') }} 
            <div class="radio">
              <?php echo $dataxxxx['terminad']->particul == 1 ? 'SI' : 'NO'; ?> 
            </div>
          </div>
          <div class="form-group">
            {{ Form::label('','Integridad de la bolsa o empaque primario') }} 
            <div class="radio">
              <?php echo $dataxxxx['terminad']->integrid == 1 ? 'SI' : 'NO'; ?> 
            </div>            
          </div>
          <div class="form-group">
            {{ Form::label('','Contenido/Volumen Completo') }} 
            <div class="radio">
              <?php echo $dataxxxx['terminad']->contenid == 1 ? 'SI' : 'NO'; ?> 
            </div>
          </div>
          <div class="form-group">
            {{ Form::label('','Ausencia de Fugas') }} 
            <div class="radio">
              <?php echo $dataxxxx['terminad']->fugasxxx == 1 ? 'SI' : 'NO'; ?> 
            </div>
          </div>
          <div class="form-group">
            {{ Form::label('','Ausencia de Miscelas/Integridad en Emulsión') }} 
            <div class="radio">
              <?php echo $dataxxxx['terminad']->miscelas == 1 ? 'SI' : 'NO'; ?> 
            </div>
          </div>
          <div class="form-group">
            {{ Form::label('','Ausencia de burbujas') }} 
            <div class="radio">
              <?php echo $dataxxxx['terminad']->burbujas == 1 ? 'SI' : 'NO'; ?> 
            </div>
          </div>
          <div class="form-group">
            {{ Form::label('','Documentación completa') }} 
            <div class="radio">
              <?php echo $dataxxxx['terminad']->document == 1 ? 'SI' : 'NO'; ?> 
            </div>
          </div>
          <div class="form-group">
            {{ Form::label('','Peso teórico') }} 
            <div class="radio">
              {{$dataxxxx['terminad']->teoricox}}
            </div>
          </div>
          <div class="form-group">
            {{ Form::label('','Peso real') }} 
            <div class="radio">
              {{$dataxxxx['terminad']->realxxxx}}
            </div>
          </div>
          <div class="form-group">
            {{ Form::label('','Peso dentro límites establecidos') }} 
            <div class="radio">
              <?php echo $dataxxxx['terminad']->limitesx == 1 ? 'SI' : 'NO'; ?> 
            </div>
          </div>
          <div class="form-group">
            {{ Form::label('','Concepto') }} 
            <div class="radio">
              <?php echo $dataxxxx['terminad']->limitesx == 1 ? 'Aprovado' : 'Rechazado'; ?> 
            </div>
          </div>
          <div class="form-group">
            {{ Form::label('estado_id','Estado') }} 
            <div class="radio">
              {{$dataxxxx['terminad']->estado->nombre}}
            </div>
          </div>
        </div>
        <div class="panel-body">
          <div class="form-group">          
            <div class="col-sm-12">
              <a href="{{route('terminados.create')}}" class="btn btn-sm btn-primary pull-right" role="button">Nuevo Producto Terminado</a>
              <a href="{{route('terminados.index')}}" class="btn btn-sm btn-primary pull-right" role="button">Volver a Productos Terminados</a>
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