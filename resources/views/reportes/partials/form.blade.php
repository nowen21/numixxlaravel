<div class="form-group">
  <input  type="hidden" id="hiddenmunici" value="<?php  if (isset($paciente)) { echo $paciente->municipio_id; } else {  echo 0;} ?>"/>
  <input  type="hidden" id="depar_id" value="<?php  if (isset($paciente)) { echo $paciente->municipio->departamento->id; } else {  echo 0;} ?>"/>
  {{ Form::label('registro','Fecha registro',['class' => 'control-label col-sm-2']) }} 
  <div class="col-sm-4">
    {{ Form::date('registro', \Carbon\Carbon::now(), ['class'=>'form-control']) }} 
  </div>
  {{ Form::label('cedula','Identificación',['class' => 'control-label col-sm-2']) }} 
  <div class="col-sm-4">
    {{ Form::text('cedula', null,['class'=>'form-control']) }} 
  </div>
</div>

<div class="form-group">
  {{ Form::label('nombres','Nombres',['class' => 'control-label col-sm-2']) }}
  <div class="col-sm-4">
    {{ Form::text('nombres', null,['class'=>'form-control']) }} 
  </div> 
  {{ Form::label('apellidos','Apellidos',['class' => 'control-label col-sm-2']) }}
  <div class="col-sm-4">
    {{ Form::text('apellidos', null,['class'=>'form-control']) }} 
  </div> 

</div>
<div class="form-group">
  {{ Form::label('peso','Peso',['class' => 'control-label col-sm-2']) }} 
  <div class="col-sm-4">
    {{ Form::text('peso', null,['class'=>'form-control']) }} 
  </div>
  {{ Form::label('genero_id','Género',['class' => 'control-label col-sm-2']) }} 
  <div class="col-sm-4">
    {{ Form::select('genero_id',$generos, null,['class'=>'form-control']) }} 
  </div>  

</div>

<div class="form-group">
  {{ Form::label('eps_id','Eps',['class' => 'control-label col-sm-2']) }} 
  <div class="col-sm-4">
    {{ Form::select('eps_id',$eps, null,['class'=>'form-control']) }}
  </div>  
  {{ Form::label('npt_id','Npt',['class' => 'control-label col-sm-2']) }} 
  <div class="col-sm-4">
    {{ Form::select('npt_id',$npt, null,['class'=>'form-control']) }}
  </div> 
</div>

<div class="form-group">
  {{ Form::label('cama','Cama',['class' => 'control-label col-sm-2']) }} 
  <div class="col-sm-4">
    {{ Form::text('cama', null,['class'=>'form-control']) }} 
  </div>
  {{ Form::label('servicio_id','Servicio',['class' => 'control-label col-sm-2']) }} 
  <div class="col-sm-4">   
    {{ Form::select('servicio_id',$servicios, null,['class'=>'form-control']) }}  
  </div>
</div>

<div class="form-group">
   {{ Form::label('edad','Edad',['class' => 'control-label col-sm-2']) }} 
  <div class="col-sm-4">
    {{ Form::text('edad', null,['class'=>'form-control']) }} 
  </div>
  {{ Form::label('clinica_id','Clinica',['class' => 'control-label col-sm-2']) }} 
  <div class="col-sm-4">
    {{ Form::select('clinica_id',$clinicas, null,['class'=>'form-control']) }} 
  </div>
</div>

<div class="form-group">
  {{ Form::label('departamento_id','Departamento',['class' => 'control-label col-sm-2']) }} 
  <div class="col-sm-4">
    {{ Form::select('departamento_id',$departamentos, null,['class'=>'form-control','id'=>'departamento_id']) }} 
  </div>
  {{ Form::label('municipio_id','Municipio',['class' => 'control-label col-sm-2']) }} 
  <div class="col-sm-4">   
    {{ Form::select('municipio_id',[''=>'Seleccione'], null,['class'=>'form-control','id'=>'municipio_id']) }} 
  </div>  
</div>
<div class="form-group">  
  {{ Form::label('estado_id','Estado',['class' => 'control-label col-sm-2']) }} 
  <div class="col-sm-10">
    {{ Form::select('estado_id',$estados, null,['class'=>'form-control']) }} 
  </div> 
</div>
<div class="form-group" style="padding-top: 20px">
 
  {{ Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary pull-right','style'=>'marging-top: 20px' ]) }} 
  @if(isset($update))
  <a href="{{route('pacientes.create')}}" class="btn btn-sm btn-primary pull-right" role="button">Nuevo Registro</a>  
   @endif
   <a href="{{route('pacientes.index')}}" class="btn btn-sm btn-primary pull-right" role="button">Volver a Pacientes</a>
</div>
@section('scripts')
<script>
  $(document).ready(function () {
    var municipios = function (departa) {
      $("#municipio_id").empty();
      $.get("{{url('pacientes/')}}/" + departa + "/munici", function (data) {
        $.each(data, function (i, datos) {
          if ($("#hiddenmunici").val() == datos.id) {
            $("#municipio_id").append('<option selected="selected" value="' + datos.id + '">' + datos.nombre + '</option>');
          } else {
            $("#municipio_id").append('<option value="' + datos.id + '">' + datos.nombre + '</option>');
          }
        })
      });
    }
    $("#departamento_id").change(function () {
      municipios($(this).val());
    });
    
    if ($("#depar_id").val() > 0) {
      municipios($("#depar_id").val());
      $("#departamento_id").val($("#depar_id").val())
    }

  });
</script>
@endsection