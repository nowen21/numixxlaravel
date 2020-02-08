
<div class="form-group">   
  {{ Form::label('','Listado de Cínicas:',['class' => 'control-label col-sm-2']) }} 
  <div class="col-sm-10">
    <ul class="list-unstyled">
      @foreach($clinicas as $clinica)
      <li>
        <label>
          {{Form::checkbox('clinicas[]',$clinica->id,null)}}
          {{$clinica->nombre}}
        </label>
      </li>
      @endforeach
    </ul>
  </div>
</div>
<div class="form-group" >
  <div class="col-sm-12" style="padding-top: 10px">
    {{ Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary pull-right','style'=>'marging-top: 20px' ]) }} 
    @if(isset($update))
    <a href="{{route('pacientes.create')}}" class="btn btn-sm btn-primary pull-right" role="button">Nuevo Registro</a>  
    @endif
    <a href="{{route('pacientes.index')}}" class="btn btn-sm btn-primary pull-right" role="button">Volver a Pacientes</a>
  </div>
</div>

