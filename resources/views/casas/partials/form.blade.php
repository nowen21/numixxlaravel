<style>
  /* Tooltip */
  .test + .tooltip > .tooltip-inner {
    background-color: #3C8DBC; 
    color: #FFFFFF; 
    border: 1px solid black; 
    padding: 15px;
    font-size: 15px;
  }
  /* Tooltip on top */
  .test + .tooltip.top > .tooltip-arrow {
    border-top: 5px solid black;
  }
  /* Tooltip on bottom */
  .test + .tooltip.bottom > .tooltip-arrow {
    border-bottom: 5px solid blue;
  }
  /* Tooltip on left */
  .test + .tooltip.left > .tooltip-arrow {
    border-left: 5px solid red;
  }
  /* Tooltip on right */
  .test + .tooltip.right > .tooltip-arrow {
    border-right: 5px solid black;
  }
</style>



<div class="form-group">
  {{ Form::label('nombre','Nombre',['class' => 'control-label col-sm-2']) }} 
  <div class="col-sm-4">
    {{ Form::text('nombre', null,['class'=>'form-control']) }} 
  </div>
  {{ Form::label('nameidxx','ID campo',['class' => 'control-label col-sm-2']) }} 
  <div class="col-sm-4">
    {{ Form::text('nameidxx', null,['class'=>'form-control test','placeholder'=>'ID campo','maxlength'=>"8" ,
    'data-toggle'=>"tooltip", 'data-placement'=>"right", 'title'=>"Este ID es con el que se va a identificar el medicamento en el formulario, debe de ser de 8 caracteres; se recomienda que se arme con el nombre de la casa"]) }}   
  </div>
</div>
<div class="form-group">
  {{ Form::label('ordecasa','Orden',['class' => 'control-label col-sm-2']) }} 
  <div class="col-sm-4">
    {{ Form::select('ordecasa',$ordenxxx, null,['class'=>'form-control test',
    'data-toggle'=>"tooltip", 'data-placement'=>"bottom", 'title'=>"Orden en que se verán en el formulario las casas"]) }} 
  </div>
  {{ Form::label('estado','Estado',['class' => 'control-label col-sm-2']) }} 
  <div class="col-sm-4">
    {{ Form::select('estado',$estadosx, null,['class'=>'form-control']) }} 
  </div>
</div>
<div class="form-group">
  <div class="col-sm-12" style="padding-top: 10px">
    {{ Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary pull-right','style'=>'marging-top: 20px' ]) }} 
    @if(isset($update))
    <a href="{{route('casas.create')}}" class="btn btn-sm btn-primary pull-right" role="button">Nueva Casa</a>  
    @endif
    <a href="{{route('casas.index')}}" class="btn btn-sm btn-primary pull-right" role="button">Volver a Casas</a>
  </div>
</div>
@section('scripts')
<script>
  $(document).ready(function () {
    $("#nombre").keyup(function () {
      $(this).val($(this).val().toUpperCase())
    });
    $('[data-toggle="tooltip"]').tooltip();
  });
</script>
@endsection