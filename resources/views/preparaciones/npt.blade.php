@extends('layouts.adminlte')
@section('styles')
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h1 style="text-align: center">FORMULACIÓN PARA ADULTO</h1>
      </div>

      <div class="panel-body">

        
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
  $('.input-number').on('keyup', function () {
    var form = {
        'tiempo': $("#tiempo").val(),
        'velocidad': $("#velocidad").val(),
        'volumen': form.tiempo * form.velocidad,
        'purga': $("#purga").val(),
        'peso': $("#peso").val(),
        'total': 0,
        'medicamentos': [
          {'medicamento': $("#aminoacidos").val(), 'cantidad': $("#aminoacidos_cant").val()},
          {'medicamento': $("#fosfato").val(), 'cantidad': $("#fosfato_cant").val()},
          {'medicamento': $("#carbohidrato").val(), 'cantidad': $("#carbohidrato_cant").val()},
          {'medicamento': $("#sodio").val(), 'cantidad': $("#sodio_cant").val()},
          {'medicamento': $("#potasio").val(), 'cantidad': $("#potasio_cant").val()},
          {'medicamento': $("#calcio").val(), 'cantidad': $("#calcio_cant").val()},
          {'medicamento': $("#magnesio").val(), 'cantidad': $("#magnesio_cant").val()},
          {'medicamento': $("#elementos").val(), 'cantidad': $("#elementos_cant").val()},
          {'medicamento': $("#multivitaminas_1").val(), 'cantidad': $("#multivitaminas_1_cant").val()},
          {'medicamento': $("#multivitaminas_2").val(), 'cantidad': $("#multivitaminas_2_cant").val()},
          {'medicamento': $("#multivitaminas_3").val(), 'cantidad': $("#multivitaminas_3_cant").val()},
          {'medicamento': $("#glutamina").val(), 'cantidad': $("#glutamina_cant").val()},
          {'medicamento': $("#vitaminac").val(), 'cantidad': $("#vitaminac_cant").val()},
          {'medicamento': $("#complejob").val(), 'cantidad': $("#complejob_cant").val()},
          {'medicamento': $("#tiamina").val(), 'cantidad': $("#tiamina_cant").val()},
          {'medicamento': $("#acido").val(), 'cantidad': $("#acido_cant").val()},
          {'medicamento': $("#vitaminak").val(), 'cantidad': $("#vitaminak_cant").val()},
          {'medicamento': $("#lipidos").val(), 'cantidad': $("#lipidos_cant").val()}
        ]
      }

    this.value = this.value.replace(/[^0-9]/g, '');
    $.ajax({

        url: $("#formulario_ajax").attr("action"),
        type: $("#formulario_ajax").attr("method"),
        data: {data: form},
        dataType: 'json',

        success: function (json) {
          //$("#formulario_ajax")[0].reset();
        },

        error: function (xhr, status) {
          alert('Disculpe, existió un problema');
        },

      });
    $('#' + $(this).prop('id').split('_')[0] + '_volu').val($(this).val())
  });
</script>
@endsection