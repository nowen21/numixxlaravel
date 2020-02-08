<div class="form-group">
  {{ Form::label('producto','Producto',['class' => 'control-label col-sm-2']) }} 
  <div class="col-sm-4">
    {{ Form::text('producto', null,['class'=>'form-control']) }} 
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
    <div class="table-responsive">
      <table class="table table-hover table-bordered table-striped datatable" style="width:100%; float: left">
        <thead>
          <tr style="font-size: 12px">             
            <th style="width: 20%">DISPOSITIVO MÉDICO</th>
            <th>LOTE</th>
            <th>CANTIDAD CONSUMIDA</th>
            <th>CANTIDAD ALISTADA</th>
            <th>CANTIDAD SOBRANTE</th>
          </tr>
        </thead>
        <tbody>
          @foreach($medicame as $medicams)
          @if($medicams['medicamd']!='')
          <tr style="font-size: 12px">

            <td>{{$medicams['medicamd']}}</td>
            <td>{{$medicams['lotexxxx']}}</td>
            <td>           
              {{ Form::text($medicams['dispo_id'].'_con', $medicams['canco_di'],['class'=>'form-control','id'=>$medicams['dispo_id'].'_con','readonly']) }} 
            </td>   
            <td>
              {{ Form::text($medicams['dispo_id'], $medicams['value_di'],['class'=>'form-control','id'=>$medicams['dispo_id'],'readonly']) }} 
            </td>      
            <td>
              {{ Form::text($medicams['dispo_id'].'_dif', $medicams['difer_di'],['class'=>'form-control numerico','id'=>$medicams['dispo_id'].'_dif','onkeypress'=>'return filterFloat(event,this);']) }} 
            </td>
          </tr>
          @endif
          @endforeach

        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="form-group" >
  <div class="col-sm-12" style="margin-top: 10px">
    <button type="button" class="btn btn-sm btn-primary pull-right guardarx" style="marging-top: 20px">Guardar</button>
    <a href="{{route('conciliaciones.index')}}" class="btn btn-sm btn-primary pull-right" role="button">Volver a Conciliaciones</a>
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
      var id = $(this).prop('id').split('_')

      $.ajax({
        url: "{{url('conciliaciones/esnumerico')}}",
        type: 'POST',
        data: {_token: $("input[name='_token']").val(),
          cantcons: $(this).val(),
          idcancon: id,
          cantalis: $('#' + id[0] + '_' + id[1]).val()
        },
        dataType: 'json',

        success: function (json) {
          if (json.cantmayo) {
            alert('la cantidad sobrante no puede ser mayor a la alistada')
            $('#' + json.idiferen).val(json.cantalis);
            $('#' + json.idcancon).val(0);
          } else {
            $('#' + json.idcancon).val(json.diferenc);

          }
        },

        error: function (xhr, status) {
          alert('Disculpe, existió un problema');
        },

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