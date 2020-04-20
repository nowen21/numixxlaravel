<div class="card-header p-2">
    <ul class="nav nav-tabs">
        @canany(['clinica-leer', 'clinica-crear', 'clinica-editar', 'clinica-borrar'])
        <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='clinica') ?' active' : '' }} 
        text-sm" href="{{ route('clinica.editar', $todoxxxx['parametr']) }}">Clínica</a></li>
        @endcanany
        @canany(['cmedicame-leer', 'cmedicame-crear', 'cmedicame-editar', 'cmedicame-borrar'])
        <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='cmedicame') ?' active' : '' }} 
        text-sm" href="{{ route('cmedicame', $todoxxxx['parametr']) }}">Medicamentos</a></li>
        @endcanany
        @canany(['crango-leer', 'crango-crear', 'crango-editar', 'crango-borrar'])
        <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='crango') ?' active' : '' }} 
        text-sm" href="{{ route('crango', $todoxxxx['parametr']) }}">Rangos</a></li>
        @endcanany
        @canany(['cremision-leer', 'cremision-crear', 'cremision-editar', 'cremision-borrar'])
        <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='cremision') ?' active' : '' }} 
        text-sm" href="{{ route('cremision', $todoxxxx['parametr']) }}">Remisiones</a></li>
        @endcanany
    </ul>
</div>