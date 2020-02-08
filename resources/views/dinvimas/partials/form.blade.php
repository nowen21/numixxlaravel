<div class="form-group">  
  {{ Form::label('dispmedico_id','Dispositivo Médico:',['class' => 'control-label col-sm-2']) }}  
  <div class="col-sm-4">
    {{ Form::select('dispmedico_id',$dispmedi, null,['class'=>'form-control']) }} 
  </div>
  {{ Form::label('dmarca_id','Marca:',['class' => 'control-label col-sm-2']) }}  
  <div class="col-sm-4">
    <select class="form-control" id="dmarca_id" name="dmarca_id">
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
    <a href="{{route('dinvimas.create')}}" class="btn btn-sm btn-primary pull-right" role="button">Nuevo Registro Invima</a>  
    @endif
    <a href="{{route('dinvimas.index')}}" class="btn btn-sm btn-primary pull-right" role="button">Volver a Registros Invimas</a>
  </div>
</div>
@section('scripts')
<script>
  $(document).ready(function () {
    var f_ajax = function (medicame) {
      $('#dmarca_id').empty();
      $('#dmarca_id').append('<option value="">Seleccione</option>');
      $.ajax({
        url: "{{url('dinvimas/marcas')}}",
        type: 'POST',
        data: {_token: $("input[name='_token']").val(),
          medicame: medicame
        },
        dataType: 'json',
        success: function (json) {
          var selected='';
          $.each(json, function (i, valor) {
            if(<?= $marcasel ?>==valor.id)
              selected='selected';
            $('#dmarca_id').append('<option '+selected+' value="' + valor.id + '">' + valor.nombcome + ' (' + valor.marcaxxx + ')</option>');
          });
        },
        error: function (xhr, status) {
          alert('Disculpe, existió un problema');
        }
      });
    }
    f_ajax($("#dispmedico_id").val());
    $("#dispmedico_id").change(function () {
      f_ajax($(this).val());
    });
    $("#nombcome,#formfarm").keyup(function () {
      $(this).val($(this).val().toUpperCase())
    });
  });
</script>
@endsection