<div class="form-group">  
  {{ Form::label('medicamento_id','Medicamento:',['class' => 'control-label col-sm-2']) }}  
  <div class="col-sm-4">
    {{ Form::select('medicamento_id',$medicame, null,['class'=>'form-control']) }} 
  </div>
  {{ Form::label('marca_id','Marca:',['class' => 'control-label col-sm-2']) }}  
  <div class="col-sm-4">
    <select class="form-control" id="marca_id" name="marca_id">
      <option value="">Seleccione</option>
    </select> 
  </div> 
</div>
<div class="form-group"> 
  {{ Form::label('reginvim','Registro Invima:',['class' => 'control-label col-sm-2']) }}  
  <div class="col-sm-4">
    {{ Form::text('reginvim', null,['class'=>'form-control dato-number','placeholder'=>'Registro Invima']) }}     
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
    <a href="{{route('invimas.create')}}" class="btn btn-sm btn-primary pull-right" role="button">Nuevo Registro Sanitario</a>  
    @endif
    <a href="{{route('invimas.index')}}" class="btn btn-sm btn-primary pull-right" role="button">Volver a Registros Sanitarios</a>
  </div>
</div>
@section('scripts')
<script>
  $(document).ready(function () {

    var f_ajax = function (medicame) {
      $('#marca_id').empty();
      $('#marca_id').append('<option value="">Seleccione</option>');
      $.ajax({
        url: "{{url('invimas/marcas')}}",
        type: 'POST',
        data: {_token: $("input[name='_token']").val(),
          medicame: medicame
        },
        dataType: 'json',
        success: function (json) {
          $.each(json, function (i, valor) {
            $('#marca_id').append('<option value="' + valor.id + '">' + valor.nombcome + ' (' + valor.marcaxxx + ')</option>');
          });
          $('#marca_id option:eq(' + <?= $marcasel ?> + ')').attr('selected', 'selected')
        },
        error: function (xhr, status) {
          alert('Disculpe, existió un problema');
        }
      });
    }
    f_ajax($("#medicamento_id").val());
    $("#medicamento_id").change(function () {
      f_ajax($(this).val());
    });
    $("#nombcome,#formfarm").keyup(function () {
      $(this).val($(this).val().toUpperCase())
    });
  });
</script>
@endsection