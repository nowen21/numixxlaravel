<div class="form-group">
  {{ Form::label('name','Rol') }} 
  {{ Form::text('name', null,['class'=>'form-control']) }} 
</div>
<div class="form-group">
  {{ Form::label('slug','Slug') }} 
  {{ Form::text('slug', null,['class'=>'form-control']) }} 
</div>
<div class="form-group">
  {{ Form::label('description','Descripción') }} 
  {{ Form::text('description', null,['class'=>'form-control']) }} 
</div>
<hr>
<h3>Permisos especiales</h3>
<div class="form-group">
  <label> {{Form::radio('special','all-access')}}Acceso Total</label>
  <label> {{Form::radio('special','no-access')}}Ningún Acceso</label>
</div>
<hr>
<h3>Lista de permisos</h3>
<div class="form-group">
  <ul class="list-unstyled">
    @foreach($permissions as $permission)
    <li>
      <label>
        {{Form::checkbox('permissions[]',$permission->id,null)}}
        {{$permission->name}}
        <em>({{$permission->description?$permission->description:'Sin descripción'}})</em>
      </label>
    </li>
    @endforeach
  </ul>
</div>
<div class="form-group">
  {{ Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary']) }} 
  @if(isset($update))
  <a href="{{route('roles.create')}}" class="btn btn-sm btn-primary pull-right" role="button">Nuevo Rol</a>  
  @endif
  <a href="{{route('roles.index')}}" class="btn btn-sm btn-primary pull-right" role="button">Volver a Roles</a>
</div>
