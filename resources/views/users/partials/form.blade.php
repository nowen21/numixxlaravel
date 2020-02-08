<div class="form-group ">
  {{ Form::label('clinica_id','Clínica') }} 
  {{Form::select('clinica_id', $clinica, null,['class'=>'form-control'])}}

</div>
<div class="form-group ">
  {{ Form::label('name','Nombre') }} 
  {{ Form::text('name', null,['class'=>'form-control']) }} 
</div>
<div class="form-group ">
  {{ Form::label('email','E-mail') }} 
  {{ Form::text('email', null,['class'=>'form-control']) }} 
</div>
<div class="form-group ">
  {{ Form::label('password','Contraseña') }}
  {{ Form::password('password', ['class' => 'form-control'])}}  
</div>
<div class="form-group">

  {{ Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary']) }} 
  @if(isset($update))
  <a href="{{route('users.create')}}" class="btn btn-sm btn-primary pull-right" role="button">Nuevo Usuario</a>  
  @endif
  <a href="{{route('users.index')}}" class="btn btn-sm btn-primary pull-right" role="button">Volver a Usuarios</a>
</div>
<hr>
<h3>Lista de roles</h3>
<div class="form-group">
  <ul class="list-unstyled">
    @foreach($roles as $role)
    <li>
      <label>
        {{Form::checkbox('roles[]',$role->id,null)}}
        {{$role->name}}
        <em>({{$role->description ?:'N/A'}})</em>
      </label>
    </li>
    @endforeach
  </ul>
</div>
@section('scripts')
<script>
  $(document).ready(function () {
    $("#name").keyup(function () {
      $(this).val($(this).val().toUpperCase())
    });
  });
</script>
@endsection