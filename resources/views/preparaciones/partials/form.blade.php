<div class="form-group">
  <input type="hidden" value="0" id="formvaci" name="formvaci">
  {{ Form::label('clinica_id','Clínica:',['class' => 'control-label col-sm-2']) }}   
  <div class="col-sm-4">
    {{ Form::select('clinica_id', $pacientes, $clinica_id,['class'=>'form-control','readonly'])}} 
  </div>
  {{ Form::label('tiempo','Tiempo Infusión:',['class' => 'control-label col-sm-2 ']) }}  
  <div class="col-sm-4">
    {{ Form::text('tiempo', null,['class'=>'form-control dato-number calcularvolumen','placeholder'=>'Tiempo de infisión','id'=>'tiempo','readonly']) }} 
  </div>
  {{ Form::label('velocidad','Velocidad Infusión:',['class' => 'control-label col-sm-2']) }}  
  <div class="col-sm-4">
    {{ Form::text('velocidad', null,['class'=>'form-control dato-number calcularvolumen','placeholder'=>'Velocidad de infisión','id'=>'velocidad','readonly']) }}     
  </div>
  {{ Form::label('volumen','Volumen Total:',['class' => 'control-label col-sm-2']) }}  
  <div class="col-sm-4">
    {{ Form::text('volumen', null,['class'=>'form-control dato-number','placeholder'=>'Volumen Total','id'=>'volumen','readonly'=>'readonly']) }}     
  </div>
  {{ Form::hidden('paciente_id', $paciente->id,['id'=>'idpaciente']) }}
  {{ Form::hidden('ips_id', $paciente->clinica_id,['id'=>'ips']) }}
  {{ Form::hidden('npt_id', $paciente->npt_id,['id'=>'npt_id']) }}
  {{ Form::label('purga','Purga:',['class' => 'control-label col-sm-2']) }}  
  <div class="col-sm-4">
    {{ Form::text('purga', null,['class'=>'form-control dato-number','placeholder'=>'Purga','readonly']) }}   
  </div>
  {{ Form::label('peso','Peso:',['class' => 'control-label col-sm-2']) }}
  <div class="col-sm-4">
    {{ Form::text('peso', null,['class'=>'form-control dato-number','placeholder'=>'Peso','readonly']) }}   
  </div>
  {{ Form::label('aguax_id','Agua:',['class' => 'control-label col-sm-2']) }}  
  <div class="col-sm-10">
    {{ Form::text('aguax_id',null,['class'=>'form-control dato-number','placeholder'=>'Volumen Total','id'=>'aguax_id','readonly'=>'readonly']) }}     
  </div>
</div>
<div class="form-group">

</div>

<br />
<br />
<hr style="border:  #000000 solid 2px"/>
  <table style="width: 100%">
    <thead >
      <tr> 
        <th style=" width: 45%; text-align: left; border-top: 2px #000 solid;border-bottom: 2px #000 solid;" >
          NUTRIENTE:
        </th>      
        <th style=" width: 10%; text-align: left; border-top: 2px #000 solid;border-bottom: 2px #000 solid;">
          REQ
        </th>
        <th style=" width: 15%; text-align: left;border-top: 2px #000 solid;border-bottom: 2px #000 solid;">
          VOLUMEN
        </th>      
        <th style=" width: 15%; text-align: left;border-top: 2px #000 solid;border-bottom: 2px #000 solid;">
          VOLUMEN PURGA
        </th>      
        <th style=" width: 15%; text-align: left;border-top: 2px #000 solid;border-bottom: 2px #000 solid;">
          PREPARADO
        </th>      
      </tr>
    </thead>
    <tbody id="checkiados">
      @foreach( $formulacione->formulacionmeds as $value)
      @if($value->cantidad!=0)
      <tr>
        <td style="  text-align: left; background: #d2d6dc" >
          {{$value->medicamento->casa->nombre}}
        </td>
        <td style="  text-align: left;">
          {{$value->cantidad}}
        </td>
        <td style="  text-align: left;">
          {{$value->volumen}}
        </td>
        <td style=" text-align: left;">
          {{number_format($value->purga,2)}}
        </td>
        <td style=" text-align: left;">
          <?php
          $checkedxx = '';
          if ($value->preparar == 1) {
            $checkedxx = 'checked';
          } else if (is_array(old('preparar_' . $value->id)) && in_array(1, old('preparar_' . $value->id))) {
            $checkedxx = 'checked';
          }
          ?>
          <input type="checkbox" class="checks" value="1" name="preparar_{{$value->id}}[]" {{$checkedxx}} id="preparar_{{$value->id}}">
        </td>
      </tr>

      @endif
      @endforeach

    </tbody>
  </table>




<div class="form-group">
  @if(!isset($noxx))
  <button type="button" class="btn btn-sm btn-primary pull-right"  id="guardaform" style="marging-top: 20px">Guardar</button>
  @endif
  <a href="{{route('preparaciones.index')}}" class="btn btn-sm btn-primary pull-right" role="button">Volver a Preparación</a>
</div>
@section('scripts')
<script>
  $(function () {
    $("#guardaform").click(function () {
      var $divs = $(".checks").toArray().length;
      var total = 0;
      $("#checkiados input").each(function (i) {
        if ($(this).is(':checked')) {
          total++;
        }

      });

      $.confirm({
        title: 'Verificación!',
        content: 'Está seguro(a) de guardar la información ingresada?',
        type: 'blue',
        typeAnimated: true,
        buttons: {
          tryAgain: {
            text: 'SI',
            btnClass: 'btn-blue',
            action: function () {

              if ($divs == total) {
                $('#formvaci').val(1);
              }
              $("#formdisp").submit();
            }
          },
          close: function () {
          }
        }
      });
    });

  });
</script>
@endsection
