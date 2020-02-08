<div class="form-group">
  {{ Form::label('clinica_id','Clínica',['class' => 'control-label col-sm-2']) }} 
  <div class="col-sm-4">
    {{ Form::select('clinica_id',$clinicax, null,['class'=>'form-control']) }} 
  </div>
  {{ Form::label('clinica_rango_id','Rango',['class' => 'control-label col-sm-2']) }} 
  <div class="col-sm-4">
    {{ Form::select('clinica_rango_id',$rangoxxx, null,['class'=>'form-control']) }} 
  </div>
</div>
<div class="form-group" style="padding-right: 0px"> 
  {{ Form::label('estado_id','Estado',['class' => 'control-label col-sm-2']) }} 
  <div class="col-sm-10">
    {{ Form::select('estado_id',$estadosx, null,['class'=>'form-control']) }} 
  </div>
</div>
<div class="form-group">
  {{ Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary pull-right anchoxxx','style'=>'marging-top: 20px' ]) }} 
  @if(isset($update))
  <a href="{{route('remisiones.create')}}" class="btn btn-sm btn-primary pull-right anchoxxx" role="button">Nueva Remisión</a>  
  @endif
  <a href="{{route('remisiones.index')}}" class="btn btn-sm btn-primary pull-right anchoxxx" role="button">Volver a Remisiones</a>
</div>
@section('scripts')
<script>
  $(document).ready(function () {
    $("#clinica_id").change(function () {
      $("#rango_id").empty()
      $("#rango_id").append('<option value="">Seleccione</option>');
      if ($(this).val() > 0) {
        f_ajax($(this).val())
      }
    });
    var f_ajax = function (clinica_id) {
      $.ajax({
        url: "{{url('remisiones/rangoajax')}}",
        type: 'POST',
        data: {
          _token: $("input[name='_token']").val(),
          clinica_id: clinica_id,
        },
        dataType: 'json',
        success: function (json) {
          $.each(json, function (i, data) {
            if (i!='') {
              $("#clinica_rango_id").append('<option value="' + i + '">' + data + '</option>');
            }
          })
        },
        error: function (xhr, status) {
          alert('Disculpe, existió un problema');
        }
      });
    }
  });

</script>

@endsection