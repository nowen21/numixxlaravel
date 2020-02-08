<div class="form-group"> 
  {{ Form::label('ordeprod','Orden de producción:',['class' => 'control-label col-sm-2']) }}  
  <div class="col-sm-4">
    {{ $ordene->ordeprod}} 
  </div>
  {{ Form::label('observac','Observaciones:',['class' => 'control-label col-sm-2']) }}  
  <div class="col-sm-4">
    {{ Form::textarea('observac', null, ['id' => 'keterangan', 'rows' => 4, 'style' => 'resize:none','class'=>'form-control']) }}
  </div> 
</div>
<div class="form-group">
  <div class="col-sm-12" style="padding-top: 10px">
    {{ Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary pull-right','style'=>'marging-top: 20px' ]) }} 
    <a href="{{route('controles.index')}}" class="btn btn-sm btn-primary pull-right" role="button">Volver a Controles</a>
  </div>
</div>
@section('scripts')
<script>

  $(document).ready(function () {

  });
</script>
@endsection