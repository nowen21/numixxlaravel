<div class="card-header p-2">
    <ul class="nav nav-tabs " role="tablist">
    @if($todoxxxx['pestpadr']==1)
        @canany(['clinicax-leer', 'clinicax-crear', 'clinicax-editar', 'clinicax-borrar'])
        <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='clinicax') ?' active' : '' }}
        text-sm" href="{{ route('clinicax', $todoxxxx['parametr']) }}">Clínica</a></li>
        @endcanany
        @endif
        @if($todoxxxx['pestpadr']==2)
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
        @endif
    </ul>
</div>
