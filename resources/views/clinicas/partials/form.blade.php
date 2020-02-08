<div class="form-group">
  {{ Form::label('nombre','Nombre',['class' => 'control-label col-sm-2']) }} 
  <div class="col-sm-4">
    {{ Form::text('nombre', null,['class'=>'form-control']) }} 
  </div>
  {{ Form::label('nit','Nit',['class' => 'control-label col-sm-2']) }} 
  <div class="col-sm-3" style="padding-right: 0px">
    {{ Form::number('nit', null,['class'=>'form-control']) }}
  </div>
  <div class="col-sm-1" style="padding-left: 0px">
    {{ Form::text('digiveri', null,['class'=>'form-control','style'=>'width: 100%; float: left','id'=>'digiveri','readonly'=>'readonly']) }} 
  </div>

</div>
<div class="form-group" style="padding-right: 0px"> 
  {{ Form::label('telefono','Teléfono',['class' => 'control-label col-sm-2']) }} 
  <div class="col-sm-4">
    {{ Form::number('telefono', null,['class'=>'form-control']) }} 
  </div>
  {{ Form::label('estado','Estado',['class' => 'control-label col-sm-2']) }} 
  <div class="col-sm-4">
    {{ Form::select('estado',$estados, null,['class'=>'form-control']) }} 
  </div>
</div>
<div class="form-group" style="padding-right: 0px"> 
  <hr>
  <h3>Lista de Medicamentos</h3>
  <ul class="list-unstyled">
    @foreach($medicame as $medicamento)
    <li>
      <label>
        {{Form::checkbox('medicamentos[]',$medicamento->id,null)}}
        {{$medicamento->nombgene}}
        
      </label>
    </li>
    @endforeach
  </ul>
</div>

<div class="form-group">
  {{ Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary pull-right','style'=>'marging-top: 20px' ]) }} 
  @if(isset($update))
  <a href="{{route('clinicas.create')}}" class="btn btn-sm btn-primary pull-right" role="button">Nueva Clínica</a>  
  @endif
  <a href="{{route('clinicas.index')}}" class="btn btn-sm btn-primary pull-right" role="button">Volver a Clínicas</a>
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