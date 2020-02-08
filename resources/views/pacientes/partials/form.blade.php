<div class="form-group">
  <input  type="hidden" id="hiddenmunici" value="<?php
  if (isset($paciente)) {
    echo $paciente->municipio_id;
  } else if (old('municipio_id') != '') {

    echo old('municipio_id');
  } else {
    echo 0;
  }
  ?>"/>
  <input  type="hidden" id="depar_id" value="<?php
  if (isset($paciente)) {
    echo $paciente->municipio->departamento->id;
  } else {
    echo 0;
  }
  ?>"/>
  {{ Form::label('registro','Fecha registro',['class' => 'control-label col-sm-2']) }} 
  <div class="col-sm-4">
    {{ Form::date('registro', null,['class'=>'form-control']) }} 
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
    {{ Form::text('peso', null,['class'=>'form-control','onkeypress'=>'return filterFloat(event,this);']) }} 
  </div>
  {{ Form::label('genero_id','Género',['class' => 'control-label col-sm-2']) }} 
  <div class="col-sm-4">
    {{ Form::select('genero_id',$generos, null,['class'=>'form-control']) }} 
  </div>  

</div>

<div class="form-group">
  {{ Form::label('eps_id','EPS',['class' => 'control-label col-sm-2']) }} 
  <div class="col-sm-4">
    {{ Form::select('eps_id',$eps, null,['class'=>'form-control']) }}
  </div>  
  {{ Form::label('npt_id','NPT',['class' => 'control-label col-sm-2']) }} 
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
  {{ Form::label('edad','Fecha de Nacimiento',['class' => 'control-label col-sm-2']) }} 
  <div class="col-sm-4">
    {{ Form::date('edad', null,['class'=>'form-control']) }} 

  </div>
  {{ Form::label('fechnaci','Edad',['class' => 'control-label col-sm-2']) }} 
  <div class="col-sm-4" >
    <div class="form-control" id="fechnaci">

    </div>
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
<div class="form-group" >
  <div class="col-sm-12" style="padding-top: 10px">
    {{ Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary pull-right','style'=>'marging-top: 20px' ]) }} 
    @if(isset($update))
    <a href="{{route('pacientes.create')}}" class="btn btn-sm btn-primary pull-right" role="button">Nuevo Registro</a>  
    @endif
    <a href="{{route('pacientes.index')}}" class="btn btn-sm btn-primary pull-right" role="button">Volver a Pacientes</a>
  </div>
</div>

@section('scripts')
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
  function filterFloat(evt, input) {
    // Backspace = 8, Enter = 13, ‘0′ = 48, ‘9′ = 57, ‘.’ = 46, ‘-’ = 43
    var key = window.Event ? evt.which : evt.keyCode;
    var chark = String.fromCharCode(key);
    var tempValue = input.value + chark;
    if (key >= 48 && key <= 57) {
      if (filter(tempValue) === false) {
        return false;
      } else {
        return true;
      }
    } else {
      if (key == 8 || key == 13 || key == 0) {
        return true;
      } else if (key == 46) {
        if (filter(tempValue) === false) {
          return false;
        } else {
          return true;
        }
      } else {
        return false;
      }
    }
  }
  function filter(__val__) {
    var preg = /^([0-9]+\.?[0-9]{0,2})$/;
    if (preg.test(__val__) === true) {
      return true;
    } else {
      return false;
    }

  }
  $(document).ready(function () {
    $("#nombres,#apellidos").keyup(function () {
      $(this).val($(this).val().toUpperCase())
    });
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
    if ($('#departamento_id').val() != '') {
      municipios($('#departamento_id').val());
    }

    if ($("#depar_id").val() > 0) {
      municipios($("#depar_id,#cama").val());
      $("#departamento_id").val($("#depar_id").val())
    }

    var f_ajax = function (fechnaci) {
      $('#fechnaci').empty();
      if (fechnaci != '') {
        $.ajax({
          url: "{{url('pacientes/calcularedad')}}",
          type: 'POST',
          data: {_token: $("input[name='_token']").val(),
            fechnaci: fechnaci
          },
          dataType: 'json',
          success: function (json) {
            $("#fechnaci").text(json.edadxxxx)
            $("#edad").val(json.fechnaci)

          },
          error: function (xhr, status) {
            alert('Disculpe, existió un problema');
          }
        });
      }
    }
    $("#edad").change(function () {
      f_ajax($(this).val())
    });
    f_ajax($("#edad").val());

    $("#edad,#registro").datepicker({
      changeMonth: true,
      changeYear: true,
      maxDate: new Date(),
      dateFormat: 'yy-mm-dd',
      defaultDate: new Date(),
      yearRange: '-110:+0'
    });


  });


</script>
@endsection