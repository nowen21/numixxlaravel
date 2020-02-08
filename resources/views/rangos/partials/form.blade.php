<div class="form-group">
  {{ Form::label('ranginic','Rango Desde',['class' => 'control-label col-sm-2']) }} 
  <div class="col-sm-4">
    {{ Form::text('ranginic', null,['class'=>'form-control','onkeypress'=>'return filterFloat(event,this);']) }} 
  </div>
  {{ Form::label('rangfina','Rango Hasta',['class' => 'control-label col-sm-2']) }} 
  <div class="col-sm-4">
    {{ Form::number('rangfina', null,['class'=>'form-control','onkeypress'=>'return filterFloat(event,this);']) }}
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
  <a href="{{route('rangos.create')}}" class="btn btn-sm btn-primary pull-right anchoxxx" role="button">Nuevo Rango</a>  
  @endif
  <a href="{{route('rangos.index')}}" class="btn btn-sm btn-primary pull-right anchoxxx" role="button">Volver a Rangos</a>
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
    $("#nombre").keyup(function () {
      $(this).val($(this).val().toUpperCase())
    });
    $("#telefono").keyup(function () {
      if (this.value.length > 10)
        this.value = this.value.slice(0, 10);
    });
  });

</script>

@endsection