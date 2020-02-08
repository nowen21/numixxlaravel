<div class="form-group">  
  {{ Form::label('clinica_id','Clínica:',['class' => 'control-label col-sm-2']) }}  
  <div class="col-sm-4">
    {{ Form::select('clinica_id',$clinicas, null,['class'=>'form-control']) }} 
  </div> 
  {{ Form::label('casa_id','Casa:',['class' => 'control-label col-sm-2']) }}  
  <div class="col-sm-4">
    {{ Form::select('casa_id',$casasxxx, null,['class'=>'form-control']) }} 
  </div> 
</div>

<div class="form-group">
  {{ Form::label('nombgene','Nombre Genérico:',['class' => 'control-label col-sm-2']) }}   
  <div class="col-sm-4">
    {{ Form::text('nombgene', null,['class'=>'form-control ','placeholder'=>'Nombre Genérico']) }} 
  </div> 
  {{ Form::label('concentr','Concentración:',['class' => 'control-label col-sm-2']) }}   
  <div class="col-sm-4">
    {{ Form::text('concentr', null,['class'=>'form-control','placeholder'=>'Concentración','onkeypress'=>'return filterFloat(event,this);']) }} 
  </div>
</div>

<div class="form-group" >   
  {{ Form::label('unidmedi','Unidad de Medida:',['class' => 'control-label col-sm-2']) }}  
  <div class="col-sm-4">
    {{ Form::text('unidmedi', null,['class'=>'form-control','placeholder'=>'Medida']) }}     
  </div> 
  {{ Form::label('estado_id','Estado:',['class' => 'control-label col-sm-2']) }}  
  <div class="col-sm-4">
    {{ Form::select('estado_id',$estados, null,['class'=>'form-control']) }} 
  </div> 
</div>
<div class="form-group" >   
  {{ Form::label('','NPTs:',['class' => 'control-label col-sm-2']) }}  
  <div class="col-sm-4">
    <ul class="list-unstyled">
      @foreach($nptsxxxx as $nptxxxxx)
      <li>
        <label>
          {{Form::checkbox('npts[]',$nptxxxxx->id,null)}}
          {{$nptxxxxx->nombre}}

        </label>
      </li>
      @endforeach
    </ul>
  </div> 
</div>

<div class="form-group">
  <div class="col-sm-12" style="padding-top: 10px">
    {{ Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary pull-right','style'=>'marging-top: 20px' ]) }} 
    @if(isset($update))
    <a href="{{route('medicamentos.create')}}" class="btn btn-sm btn-primary pull-right" role="button">Nuevo Medicamento</a>  
    @endif
    <a href="{{route('medicamentos.index')}}" class="btn btn-sm btn-primary pull-right" role="button">Volver a Medicamentos</a>
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
    $('.dato-number').on('keyup', function () {
      //this.value = this.value.replace(/[^0-9]/g, '');
    })
    $("#nombregen").keyup(function () {
      $(this).val($(this).val().toUpperCase())
    });
    $
  });
</script>
@endsection