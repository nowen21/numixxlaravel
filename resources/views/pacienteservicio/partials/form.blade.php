
<div class="form-group">    
  {{ Form::label('paciente_id','Paciente:',['class' => 'control-label col-sm-2']) }}  
  <div class="col-sm-4">
    {{ Form::select('paciente_id',$pacientx, null,['class'=>'form-control']) }} 
  </div>  
  {{ Form::label('servicio_id','Servicio:',['class' => 'control-label col-sm-2']) }}  
  <div class="col-sm-4">
    {{ Form::select('servicio_id',$servicio, null,['class'=>'form-control']) }} 
  </div>  
  {{ Form::label('estado_id','Estado:',['class' => 'control-label col-sm-2']) }}  
  <div class="col-sm-10">
    {{ Form::select('estado_id',$estadosx, null,['class'=>'form-control']) }} 
  </div>  
</div>
<div class="form-group" >
  <div class="col-sm-12" style="padding-top: 10px">
    @if(isset($showxxxx))
    {{ Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary pull-right','style'=>'marging-top: 20px' ]) }} 
    @endif
    @if(isset($update))
    <a href="{{route('pacienteservicio.create')}}" class="btn btn-sm btn-primary pull-right" role="button">Nuevo Registro</a>  
    @endif
    <a href="{{route('pacienteservicio.index')}}" class="btn btn-sm btn-primary pull-right" role="button">Volver a Paciente Servicios</a>
  </div>
</div>

