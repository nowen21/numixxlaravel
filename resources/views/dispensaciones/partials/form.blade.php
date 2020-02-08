<div class="form-group">
  <input type="hidden" id="formvaci" name="formvaci" value="{{ old('formvaci') }}">
  {{ Form::label('producto','Producto',['class' => 'control-label col-sm-2']) }} 
  <div class="col-sm-4">
    {{ Form::text('producto', 'NUTRICIÓN PARENTERAL',['class'=>'form-control','readonly'=>'readonly']) }} 
  </div>
  {{ Form::label('created_at','Fecha',['class' => 'control-label col-sm-2']) }} 
  <div class="col-sm-4">
    {{ Form::text('created_at', null,['class'=>'form-control','readonly'=>'readonly']) }} 
  </div>
</div>
<div class="form-group">
  {{ Form::label('ordepres','OP',['class' => 'control-label col-sm-2']) }} 
  <div class="col-sm-4">
    {{ Form::text('ordepres', null,['class'=>'form-control','readonly'=>'readonly']) }} 
  </div>
  {{ Form::label('estado_id','Estado',['class' => 'control-label col-sm-2']) }} 
  <div class="col-sm-4">
    {{ Form::select('estado_id',$estados, null,['class'=>'form-control']) }} 
  </div>
</div>
<div class="form-group" >
  <div class="col-sm-12" style="margin-top: 10px">
    <table class="table table-hover table-bordered table-striped datatable" style="width:100%">
      <thead>
        <tr style="font-size: 12px">            
          <th>DISPOSITIVO MÉDICO</th>
          <th>UND</th>
          <th>LOTE</th>
          <th>REGISTRO INVIMA</th>
          <th style="width: 75px">F VENC</th> 
        </tr>
      </thead>
      <tbody id="alistamientos">
        @foreach($medicame as $medicams)
        @if($medicams['medicamd']!='')
        <tr style="font-size: 12px">     
          <td>{{$medicams['medicamd']}}</td>
          <td>
            @if($medicams['medicamd']!='')
            {{ Form::text($medicams['dispo_id'], $medicams['value_di'],['class'=>'form-control numerico','id'=>$medicams['dispo_id'],'onkeypress'=>'return filterFloat(event,this);']) }} 
            @endif
          </td>
          <td>{{$medicams['lotexxxd']}}</td>          
          <td>{{$medicams['reginvid']}}</td>          
          <td>{{$medicams['fechvend']}}</td> 
        </tr>
        @endif
        @endforeach

      </tbody>
    </table>
  </div>

</div>

<div class="form-group" >
  <div class="col-sm-12" style="margin-top: 10px">
    <button type="button" class="btn btn-sm btn-primary pull-right guardarx" style="marging-top: 20px">Guardar</button>
    <!--//{{ Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary pull-right','style'=>'marging-top: 20px' ]) }}--> 
    @if(isset($update))
    <a href="{{route('dispensaciones.create')}}" class="btn btn-sm btn-primary pull-right " role="button">Nueva Dispensación</a>  
    @endif
    <a href="{{route('dispensaciones.index')}}" class="btn btn-sm btn-primary pull-right" role="button">Volver a Dispensaciones</a>
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
    $("#producto").keyup(function () {
      $(this).val($(this).val().toUpperCase())
    });
    $(".numerico").keyup(function () {
      $.ajax({
        url: "{{url('dispensaciones/esnumerico')}}",
        type: 'POST',
        data: {_token: $("input[name='_token']").val(),
          cantalis: $(this).val(),
          idcanali: $(this).prop('id')
        },
        dataType: 'json',
        success: function (json) {
          if (json.cantmayo) {
            alert('la cantidad solicitada no puede ser mayor a la del inventario');
          }
          $('#' + json.idcanali).val(json.numeroxx);
        },

        error: function (xhr, status) {
          alert('Disculpe, existió un problema');
        }

      });
    });
    $('.guardarx').click(function () {
      $.confirm({
        title: 'Verificación!',
        content: 'Está segur@ de guardar la información ingresada?',
        type: 'blue',
        typeAnimated: true,
        buttons: {
          tryAgain: {
            text: 'SI',
            btnClass: 'btn-blue',
            action: function () {
              var hayalmenosuno = 0;
              $("#alistamientos input").each(function () {
                if ($(this).val() > 0) {
                  hayalmenosuno = 1;
                }

              });
              $("#formvaci").val(hayalmenosuno);
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