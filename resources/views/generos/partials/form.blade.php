<div class="form-group">
  {{ Form::label('nombre','Nombre',['class' => 'control-label col-sm-2']) }} 
  <div class="col-sm-4">
    {{ Form::text('nombre', null,['class'=>'form-control']) }} 
  </div>
  {{ Form::label('estado','Estado',['class' => 'control-label col-sm-2']) }} 
  <div class="col-sm-4">
    {{ Form::select('estado',$estados, null,['class'=>'form-control']) }} 
  </div>
</div>

<div class="form-group">
  {{ Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary pull-right','style'=>'marging-top: 20px' ]) }} 
  @if(isset($update))
  <a href="{{route('generos.create')}}" class="btn btn-sm btn-primary pull-right" role="button">Nuevo Género</a>  
  @endif
  <a href="{{route('generos.index')}}" class="btn btn-sm btn-primary pull-right" role="button">Volver a Géneros</a>
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