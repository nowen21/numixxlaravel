<div class="form-group">
  {{ Form::label('name','Permiso') }} 
  {{ Form::text('name', null,['class'=>'form-control']) }} 
</div>
<div class="form-group">
  {{ Form::label('slug','Ruta Amigable') }} 
  {{ Form::text('slug', null,['class'=>'form-control']) }} 
</div>
<div class="form-group">
  {{ Form::label('description','Descripción') }} 
  {{ Form::text('description', null,['class'=>'form-control']) }} 
</div>

<div class="form-group">

  {{ Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary pull-right']) }} 
  @if(isset($update))
  <a href="{{route('permisos.create')}}" class="btn btn-sm btn-primary pull-right" role="button">Nuevo Permiso</a>  
  @endif
  <a href="{{route('permisos.index')}}" class="btn btn-sm btn-primary pull-right" role="button">Volver a Permisos</a>
</div>
