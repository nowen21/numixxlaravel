<div class="form-group">  
  {{ Form::label('dispmedico_id','Dispositivo Médico:',['class' => 'control-label col-sm-2']) }}  
  <div class="col-sm-4">
    {{ Form::select('dispmedico_id',$dispmedi, null,['class'=>'form-control']) }} 
  </div> 
  {{ Form::label('marcaxxx','Marca:',['class' => 'control-label col-sm-2']) }}  
  <div class="col-sm-4">
    {{ Form::text('marcaxxx', null,['class'=>'form-control ','placeholder'=>'Marca']) }}     
  </div>
   
</div>
<div class="form-group"> 
  {{ Form::label('nombcome','Nombre Comercial:',['class' => 'control-label col-sm-2']) }}  
  <div class="col-sm-4">
    {{ Form::text('nombcome', null,['class'=>'form-control ','placeholder'=>'Nombre Comercial']) }}     
  </div>
  {{ Form::label('osmorali','Osmolaridad:',['class' => 'control-label col-sm-2']) }}  
  <div class="col-sm-4">
    {{ Form::text('osmorali', null,['class'=>'form-control dato-number','placeholder'=>'Osmolaridad','onkeypress'=>'return filterFloat(event,this);']) }}     
  </div>     
</div>
<div class="form-group"> 
  {{ Form::label('pesoespe','Peso:',['class' => 'control-label col-sm-2']) }}   
  <div class="col-sm-4">
    {{ Form::text('pesoespe', null,['class'=>'form-control ','placeholder'=>'Peso Específico','onkeypress'=>'return filterFloat(event,this);']) }} 
  </div>
  {{ Form::label('formfarm','Forma Farmaceútica:',['class' => 'control-label col-sm-2']) }}   
  <div class="col-sm-4">
    {{ Form::text('formfarm', null,['class'=>'form-control dato-number','placeholder'=>'Forma Farmaceútica']) }} 
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
    <a href="{{route('dmarcas.create')}}" class="btn btn-sm btn-primary pull-right" role="button">Nueva Marca</a>  
    @endif
    <a href="{{route('dmarcas.index')}}" class="btn btn-sm btn-primary pull-right" role="button">Volver a Marcas</a>
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
    $("#nombcome,#formfarm").keyup(function () {
      $(this).val($(this).val().toUpperCase())
    });
    $
  });
</script>
@endsection