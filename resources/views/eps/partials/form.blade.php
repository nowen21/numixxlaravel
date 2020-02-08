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
  <div class="col-sm-12" style="padding-top: 10px">
    {{ Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary pull-right','style'=>'marging-top: 20px' ]) }} 
    @if(isset($update))
    <a href="{{route('eps.create')}}" class="btn btn-sm btn-primary pull-right" role="button">Nueva EPS</a>  
    @endif
    <a href="{{route('eps.index')}}" class="btn btn-sm btn-primary pull-right" role="button">Volver a EPSs</a>
  </div>
</div>

@section('scripts')
<script>
  $(document).ready(function () {
    $("#nombre").keyup(function () {
      $(this).val($(this).val().toUpperCase())
    });
    $("#telefono").keyup(function () {
      if (this.value.length > 10)
        this.value = this.value.slice(0, 10);
    });
    $("#nit").keyup(function () {
      this.value = this.value.replace(/[^0-9]/g, '');
      if (this.value.length > 11)
        this.value = this.value.slice(0, 11);
      $.ajax({

        url: "{{url('clinicas/dv')}}",
        type: 'POST',

        data: {_token: $("input[name='_token']").val(),
          nitxxxxx: $("#nit").val()
        },
        dataType: 'json',
        success: function (json) {
          $("#digiveri").val(json.digitoxx);
        },
        error: function (xhr, status) {
          alert('Disculpe, existió un problema');
        },

      });
    });
  });

</script>

@endsection