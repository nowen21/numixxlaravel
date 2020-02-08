
<div class="form-group" >  
  {{ Form::label('npt_id','Npt:',['class' => 'control-label col-sm-2']) }}  
  <div class="col-sm-4">
    {{Form::select('npt_id',$npts,null,['name'=>'npt_id','class'=>'form-control'])}}
  </div> 
  {{ Form::label('medicamento_id','Medicamento:',['class' => 'control-label col-sm-2']) }}  
  <div class="col-sm-4">
   {{Form::select('medicamento_id',$medicame,null,['class'=>'form-control'])}}
  </div> 

</div>
<div class="form-group">  
  {{ Form::label('randesde','Rango Desde:',['class' => 'control-label col-sm-2']) }}  
  <div class="col-sm-4">
    {{ Form::text('randesde', null,['class'=>'form-control','placeholder'=>'Rango Desde','onkeypress'=>'return filterFloat(event,this);']) }}  
  </div> 
  {{ Form::label('ranhasta','Rango Hasta:',['class' => 'control-label col-sm-2']) }}  
  <div class="col-sm-4">
    {{ Form::text('ranhasta', null,['class'=>'form-control','placeholder'=>'Rango Hasta','onkeypress'=>'return filterFloat(event,this);']) }} 
  </div> 
</div>
<div class="form-group" >  
  {{ Form::label('rangunid','Unidad del Rango:',['class' => 'control-label col-sm-2']) }}  
  <div class="col-sm-4">
    {{ Form::text('rangunid', null,['class'=>'form-control','placeholder'=>'Unidad del Rango']) }}  
  </div> 
  {{ Form::label('estado_id','Estado:',['class' => 'control-label col-sm-2']) }}  
  <div class="col-sm-4">
    {{ Form::select('estado_id',$estados, null,['class'=>'form-control']) }} 
  </div> 
</div>
<div class="form-group">
  <div class="col-sm-12" style="padding-top: 10px">
    {{ Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary pull-right','style'=>'marging-top: 20px' ]) }} 
    @if(isset($update))
    <a href="{{route('medicamentonpts.create')}}" class="btn btn-sm btn-primary pull-right" role="button">Nuevo Medicamento Npt</a>  
    @endif
    <a href="{{route('medicamentonpts.index')}}" class="btn btn-sm btn-primary pull-right" role="button">Volver a Medicamentos Npt</a>
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
   
  });
</script>
@endsection