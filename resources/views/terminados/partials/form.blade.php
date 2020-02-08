<div class="form-group">
  {{ Form::label('proceso_id','Proceso') }} 
  @if($dataxxxx['update'])
  @if(count($dataxxxx['procesos'])>1)
  {{ Form::select('proceso_id',$dataxxxx['procesos'], null,['class'=>'form-control']) }} 
  @else
  {{ Form::label('','No hay procesos terminados, intente cuando hayan',['class'=>'form-control']) }} 

  @endif

  @else
  {{ Form::text('proceso_id', null,['class'=>'form-control','readonly']) }} 
  @endif
</div>
<div class="form-group">
  {{ Form::label('','Datos completos correctos en la etiqueta') }} 

  <div class="radio">
    <label><input type="radio" name="completo" <?php echo (isset($dataxxxx['terminad']) && $dataxxxx['terminad']->completo == 1) ? 'checked' : ''; ?>  @if(old('completo') && old('completo')==1) checked @endif value="1">SI</label>
  </div>
  <div class="radio">
    <label><input type="radio" name="completo" <?php echo (isset($dataxxxx['terminad']) && $dataxxxx['terminad']->completo == 2) ? 'checked' : ''; ?>  @if(old('completo')&& old('completo')==2) checked @endif value="2">NO</label>
  </div>
</div>
<div class="form-group">
  {{ Form::label('','Ausencia de Partículas') }} 

  <div class="radio">
    <label><input type="radio" name="particul" value="1" <?php echo (isset($dataxxxx['terminad']) && $dataxxxx['terminad']->particul == 1) ? 'checked' : ''; ?> @if(old('particul') && old('particul')==1) checked @endif>SI</label>
  </div>
  <div class="radio">
    <label><input type="radio" name="particul" value="2" <?php echo (isset($dataxxxx['terminad']) && $dataxxxx['terminad']->particul == 2) ? 'checked' : ''; ?> @if(old('particul') && old('particul')==2) checked @endif>NO</label>
  </div>
</div>
<div class="form-group">
  {{ Form::label('','Integridad de la bolsa o empaque primario') }} 
  <div class="radio">
    <label><input type="radio" name="integrid" value="1" <?php echo (isset($dataxxxx['terminad']) && $dataxxxx['terminad']->integrid == 1) ? 'checked' : ''; ?> @if(old('integrid') && old('integrid')==1) checked @endif>SI</label>
  </div>
  <div class="radio">
    <label><input type="radio" name="integrid" value="2" <?php echo (isset($dataxxxx['terminad']) && $dataxxxx['terminad']->integrid == 2) ? 'checked' : ''; ?> @if(old('integrid') && old('integrid')==2) checked @endif>NO</label>
  </div>
</div>
<div class="form-group">
  {{ Form::label('','Contenido/Volumen Completo') }} 
  <div class="radio">
    <label><input type="radio" name="contenid" value="1" <?php echo (isset($dataxxxx['terminad']) && $dataxxxx['terminad']->contenid == 1) ? 'checked' : ''; ?> @if(old('contenid') && old('contenid')==1) checked @endif>SI</label>
  </div>
  <div class="radio">
    <label><input type="radio" name="contenid" value="2" <?php echo (isset($dataxxxx['terminad']) && $dataxxxx['terminad']->contenid == 2) ? 'checked' : ''; ?> @if(old('contenid') && old('contenid')==2) checked @endif>NO</label>
  </div>
</div>
<div class="form-group">
  {{ Form::label('','Ausencia de Fugas') }} 
  <div class="radio">
    <label><input type="radio" name="fugasxxx" value="1" <?php echo (isset($dataxxxx['terminad']) && $dataxxxx['terminad']->fugasxxx == 1) ? 'checked' : ''; ?> @if(old('fugasxxx') && old('fugasxxx')==1) checked @endif>SI</label>
  </div>
  <div class="radio">
    <label><input type="radio" name="fugasxxx" value="2" <?php echo (isset($dataxxxx['terminad']) && $dataxxxx['terminad']->fugasxxx == 2) ? 'checked' : ''; ?> @if(old('fugasxxx') && old('fugasxxx')==2) checked @endif>NO</label>
  </div>
</div>
<div class="form-group">
  {{ Form::label('','Ausencia de Miscelas/Integridad en Emulsión') }} 
  <div class="radio">
    <label><input type="radio" name="miscelas" value="1" <?php echo (isset($dataxxxx['terminad']) && $dataxxxx['terminad']->miscelas == 1) ? 'checked' : ''; ?> @if(old('miscelas') && old('miscelas')==1) checked @endif>SI</label>
  </div>
  <div class="radio">
    <label><input type="radio" name="miscelas" value="2" <?php echo (isset($dataxxxx['terminad']) && $dataxxxx['terminad']->miscelas == 2) ? 'checked' : ''; ?> @if(old('miscelas') && old('miscelas')==2) checked @endif>NO</label>
  </div>
</div>
<div class="form-group">
  {{ Form::label('','Ausencia de burbujas') }} 
  <div class="radio">
    <label><input type="radio" name="burbujas" value="1" <?php echo (isset($dataxxxx['terminad']) && $dataxxxx['terminad']->burbujas == 1) ? 'checked' : ''; ?> @if(old('burbujas') && old('burbujas')==1) checked @endif>SI</label>
  </div>
  <div class="radio">
    <label><input type="radio" name="burbujas" value="2" <?php echo (isset($dataxxxx['terminad']) && $dataxxxx['terminad']->burbujas == 2) ? 'checked' : ''; ?> @if(old('burbujas') && old('burbujas')==2) checked @endif>NO</label>
  </div>
</div>
<div class="form-group">
  {{ Form::label('','Documentación completa') }} 
  <div class="radio">
    <label><input type="radio" name="document" value="1" <?php echo (isset($dataxxxx['terminad']) && $dataxxxx['terminad']->document == 1) ? 'checked' : ''; ?> @if(old('document') && old('document')==1) checked @endif>SI</label>
  </div>
  <div class="radio">
    <label><input type="radio" name="document" value="2" <?php echo (isset($dataxxxx['terminad']) && $dataxxxx['terminad']->document == 2) ? 'checked' : ''; ?> @if(old('document') && old('document')==2) checked @endif>NO</label>
  </div>
</div>
<div class="form-group">
  {{ Form::label('teoricox','Peso teórico') }} 
  {{ Form::text('teoricox', null,['class'=>'form-control','onkeypress'=>'return filterFloat(event,this);','readonly'=>'readonly']) }} 
</div>
<div class="form-group">
  {{ Form::label('realxxxx','Peso real') }} 
  {{ Form::text('realxxxx', null,['class'=>'form-control','onkeypress'=>'return filterFloat(event,this);']) }} 
</div>
<div class="form-group">
  {{ Form::label('','Peso dentro límites establecidos') }} 
  <div class="radio">
    <label><input type="radio" name="limitesx" value="1" <?php echo (isset($dataxxxx['terminad']) && $dataxxxx['terminad']->limitesx == 1) ? 'checked' : ''; ?> @if(old('limitesx') && old('limitesx')==1) checked @endif>SI</label>
  </div>
  <div class="radio">
    <label><input type="radio" name="limitesx" value="2" <?php echo (isset($dataxxxx['terminad']) && $dataxxxx['terminad']->limitesx == 2) ? 'checked' : ''; ?> @if(old('coloraci') && old('limitesx')==2) checked @endif>NO</label>
  </div>
</div>
<div class="form-group">
  {{ Form::label('','Concepto') }} 
  <div class="radio">
    <label><input type="radio" name="concepto" value="A" <?php echo (isset($dataxxxx['terminad']) && $dataxxxx['terminad']->concepto == 'A') ? 'checked' : ''; ?> @if(old('concepto') && old('concepto')=='A') checked @endif><strong>(A)</strong>Aprobado</label>
  </div>
  <div class="radio">
    <label><input type="radio" name="concepto" value="R" <?php echo (isset($dataxxxx['terminad']) && $dataxxxx['terminad']->concepto == 'R') ? 'checked' : ''; ?> @if(old('concepto') && old('concepto')=='R') checked @endif><strong>(R)</strong>Rechazado</label>
  </div>
</div>
<div class="form-group">
  {{ Form::label('estado_id','Estado') }} 
  {{ Form::select('estado_id',$dataxxxx['estadosx'], null,['class'=>'form-control']) }} 
</div>

<div class="form-group">

  {{ Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary']) }} 

  @if(isset($update))
  <a href="{{route('terminados.create')}}" class="btn btn-sm btn-primary pull-right" role="button">Nuevo Producto Terminado</a>  
  @endif
  <a href="{{route('terminados.index')}}" class="btn btn-sm btn-primary pull-right" role="button">Volver a Productos Terminados</a>
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
    $('#proceso_id').on('change', function (e) {
      if ($(this).val() != '') {
        $.ajax({
          url: "{{url('terminados/pesoteorico')}}",
          type: 'POST',
          data: {_token: $("input[name='_token']").val(),
            dataxxxx: $('#formnpt').serializeArray(),
            procesox: $(this).val()
          },
          dataType: 'json',
          success: function (json) {
            $('#teoricox').val(json.pesoteor)
          },
          error: function (xhr, status) {
            alert('Disculpe, existió un problema');
          }
        });
      } else {
        $('#teoricox').val('')
      }
    })
  });
</script>
@endsection