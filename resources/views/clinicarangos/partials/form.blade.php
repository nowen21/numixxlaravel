<div class="form-group">
  {{ Form::label('clinica_id','Clínica',['class' => 'control-label col-sm-2']) }} 
  <div class="col-sm-4">
    {{ Form::select('clinica_id',$clinicax, null,['class'=>'form-control']) }} 
  </div>
  {{ Form::label('rango_id','Rango',['class' => 'control-label col-sm-2']) }} 
  <div class="col-sm-4">
    {{ Form::select('rango_id',$rangoxxx, null,['class'=>'form-control']) }} 
  </div>
</div>
<div class="form-group" style="padding-right: 0px"> 
  {{ Form::label('estado_id','Estado',['class' => 'control-label col-sm-2']) }} 
  <div class="col-sm-10">
    {{ Form::select('estado_id',$estados, null,['class'=>'form-control']) }} 
  </div>
</div>
<div class="form-group">
  {{ Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary pull-right anchoxxx','style'=>'marging-top: 20px' ]) }} 
  @if(isset($update))
  <a href="{{route('clinicarangos.create')}}" class="btn btn-sm btn-primary pull-right anchoxxx" role="button">Nuevo Clínica Rango</a>  
  @endif
  <a href="{{route('clinicarangos.index')}}" class="btn btn-sm btn-primary pull-right anchoxxx" role="button">Volver a Clínicas Rangos</a>
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
    var preg = /^-?[0-9]+([,\.][0-9]*)?$/;
    if (preg.test(__val__) === true) {
      return true;
    } else {
      return false;
    }

  }
  $(document).ready(function () {
    $("#clinica_id").change(function () {
      $("#rango_id").empty()
      $("#rango_id").append('<option value="">Seleccione</option>');
      if ($(this).val() > 0) {
        f_ajax($(this).val())
      }
    });
    var f_ajax = function (clinica_id) {
      $.ajax({
        url: "{{url('clinicarangos/rangoajax')}}",
        type: 'POST',
        data: {
          _token: $("input[name='_token']").val(),
          clinica_id: clinica_id,
          rango_id: "<?= $irangoxx ?>"
        },
        dataType: 'json',
        success: function (json) {
          $.each(json, function (i, data) {
            if (i!='') {
              $("#rango_id").append('<option value="' + i + '">' + data + '</option>');
            }
          })
        },
        error: function (xhr, status) {
          alert('Disculpe, existió un problema');
        }
      });
    }
  });

</script>

@endsection