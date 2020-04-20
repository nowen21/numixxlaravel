<div class="card-header">
    {{$todoxxxx['cardheap']}}
  </div>
<div class="card-header p-2">
    <ul class="nav nav-tabs">
        @canany(['paciente-leer', 'paciente-crear', 'paciente-editar', 'paciente-borrar'])
        <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='paciente') ?' active' : '' }} text-sm" 
        href="{{ route('paciente', $todoxxxx['parametr']) }}">Paciente</a></li>
        @endcanany

        @if(($todoxxxx['slotxxxx']=='paciente' && 
        ($todoxxxx['accionxx']=='Editar'||$todoxxxx['accionxx']=='Ver')) || 
        $todoxxxx['slotxxxx']=='formular'
        )
        @canany(['formular-leer', 'formular-crear', 'formular-editar', 'formular-borrar'])
        <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='formular') ?' active' : '' }} text-sm" 
        href="{{ route('formular', $todoxxxx['parametr']) }}">Formulaciones</a></li>
        @endcanany
        @endif
    </ul>
</div>