<div class="form-group">
  {{ Form::label('nombre','Nombre',['class' => 'control-label col-sm-2']) }} 
  <div class="col-sm-4">
    {{ Form::text('nombre', null,['class'=>'form-control']) }} 
  </div>
  {{ Form::label('clinica_id','Clínica',['class' => 'control-label col-sm-2']) }} 
  <div class="col-sm-4">
    {{ Form::select('clinica_id',$clinicax, null,['class'=>'form-control']) }} 
  </div>
</div>
<div class="form-group">
  {{ Form::label('estado_id','Estado',['class' => 'control-label col-sm-2']) }} 
  <div class="col-sm-10">
    {{ Form::select('estado_id',$estados, null,['class'=>'form-control']) }} 
  </div>
</div>

<div class="form-group">
  {{ Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary pull-right','style'=>'marging-top: 20px' ]) }} 
  @if(isset($update))
  <a href="{{route('servicios.create')}}" class="btn btn-sm btn-primary pull-right" role="button">Nuevo Servicio</a>  
  @endif
  <a href="{{route('servicios.index')}}" class="btn btn-sm btn-primary pull-right" style=" margin-right: 5px"  role="button">Volver a Servicios</a>
</div>
@section('scripts')
<script>
  $(document).ready(function () {
    $("#nombre").keyup(function () {
      $(this).val($(this).val().toUpperCase())
    });
  });

</script>

@endsection