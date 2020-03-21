<div class="card">
  <div class="card-header">
    USUARIO: {{ $todoxxxx['usuariox']->name }}
  </div>
  <div class="card-header p-2">
    <ul class="nav nav-tabs">
      @canany(['usuarios-leer', 'usuarios-crear', 'usuarios-editar', 'usuarios-borrar'])
      <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='usuarios') ?' active' : '' }} text-sm" 
        href="{{ route('usuarios.editar', $todoxxxx['parametr']) }}">Usuario</a></li>
      @endcanany
      @canany(['usuarios-leer', 'usuarios-crear', 'usuarios-editar', 'usuarios-borrar'])
      <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='urol') ?' active' : '' }} text-sm" 
        href="{{ route('usuarios.editar', $todoxxxx['parametr']) }}">Roles</a></li>
      @endcanany
      
    </ul>
  </div>
  <div class="card-body">
    <div class="tab-content">
      <div class="tab-pane active" id="{{ $todoxxxx['slotxxxx'] }}">
        @if(isset($usuarios))
          {{ $usuarios }}
        @endif
        @if(isset($urol))
          {{ $urol }}
        @endif
       
      </div>
    </div>
  </div>
</div>