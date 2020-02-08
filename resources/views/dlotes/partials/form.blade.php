<div class="form-group"> 
  {{ Form::label('dispmedico_id','Dispositivo Médico:',['class' => 'control-label col-sm-2']) }}  
  <div class="col-sm-4">
    {{ Form::select('dispmedico_id',$medicame, null,['class'=>'form-control']) }} 
  </div>
  {{ Form::label('dmarca_id','Marca:',['class' => 'control-label col-sm-2']) }}  
  <div class="col-sm-4">
    <select class="form-control" id="dmarca_id" name="dmarca_id">
      <option value="">Seleccione</option>
    </select> 
  </div> 
</div>
<div class="form-group">  
  {{ Form::label('dinvima_id','Registro Invima:',['class' => 'control-label col-sm-2']) }}  
  <div class="col-sm-4">
    <select class="form-control" id="dinvima_id" name="dinvima_id">
      <option value="">Seleccione</option>
    </select> 
  </div> 
  {{ Form::label('fechvenc','Fecha Vencimiento',['class' => 'control-label col-sm-2']) }} 
  <div class="col-sm-4">
    {{ Form::date('fechvenc', \Carbon\Carbon::now(), ['class'=>'form-control']) }} 
  </div>  
</div>
<div class="form-group">  
  {{ Form::label('inventar','Inventario:',['class' => 'control-label col-sm-2']) }}   
  <div class="col-sm-4">
    {{ Form::text('inventar', null,['class'=>'form-control ','placeholder'=>'Inventario','onkeypress'=>'return filterFloat(event,this);']) }} 
  </div> 
  {{ Form::label('lotexxxx','Lote:',['class' => 'control-label col-sm-2']) }}   
  <div class="col-sm-4">
    {{ Form::text('lotexxxx', null,['class'=>'form-control dato-number','placeholder'=>'Lote']) }} 
  </div>
</div>
<div class="form-group">    
  {{ Form::label('estado_id','Estado:',['class' => 'control-label col-sm-2']) }}  
  <div class="col-sm-10">
    {{ Form::select('estado_id',$estados, null,['class'=>'form-control']) }} 
  </div>  
</div>
<div class="form-group">
  <div class="col-sm-12" style="padding-top: 10px">
    {{ Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary pull-right','style'=>'marging-top: 20px' ]) }} 
    @if(isset($update))
    <a href="{{route('dlotes.create')}}" class="btn btn-sm btn-primary pull-right" role="button">Nuevo Lote</a>  
    @endif
    <a href="{{route('dlotes.index')}}" class="btn btn-sm btn-primary pull-right" role="button">Volver a Lotes</a>
  </div>
</div>
@section('scripts')
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
    var f_ajax = function (medicame, urlxxxxx, selectxx, seleccio, tipoxxx) {
      $('#' + selectxx).empty();
      $('#' + selectxx).append('<option value="">Seleccione</option>');
      if (selectxx == 'dinvima_id' && tipoxxx) {
        medicame =<?= $marcasel ?>
      }
      $.ajax({
        url: urlxxxxx,
        type: 'POST',
        data: {_token: $("input[name='_token']").val(),
          medicame: medicame
        },
        dataType: 'json',
        success: function (json) {
          var selected = '';
          $.each(json, function (i, valor) {
            if (selectxx == 'dmarca_id') {
              if (seleccio == valor.id)
                selected = 'selected'
              $('#' + selectxx).append('<option '+selected+' value="' + valor.id + '">' + valor.nombcome + ' (' + valor.marcaxxx + ')</option>');
            } else {
              $('#' + selectxx).append('<option value="' + valor.id + '">Registro Sanitario: ' + valor.reginvim + '</option>');
            }
          });
          if (tipoxxx) {
            $('#' + selectxx + ' option:eq(' + seleccio + ')').attr('selected', 'selected')
          }
        },
        error: function (xhr, status) {
          alert('Disculpe, existió un problema');
        }
      });
    }

    f_ajax($("#dispmedico_id").val(), "{{url('dinvimas/marcas')}}", 'dmarca_id',<?= $marcasel ?>, true);
    f_ajax($("#dmarca_id").val(), "{{url('dlotes/invimas')}}", 'dinvima_id',<?= $invimsel ?>, true);
    $("#dispmedico_id").change(function () {
      f_ajax($(this).val(), "{{url('dinvimas/marcas')}}", 'dmarca_id', '', false);
    });
    $("#dmarca_id").change(function () {
      f_ajax($(this).val(), "{{url('dlotes/invimas')}}", 'dinvima_id', '', false);
    });




    $("#nombcome,#formfarm").keyup(function () {
      $(this).val($(this).val().toUpperCase())
    });
    $
  });
</script>
@endsection