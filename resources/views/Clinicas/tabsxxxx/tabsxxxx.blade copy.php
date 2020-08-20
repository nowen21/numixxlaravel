<div class="card">
    <div class="card-header">
        {{$todoxxxx['cardhead']}}
    </div>
    <div class="card-body">

        <ul class="nav nav-tabs" role="tablist">
            @if($todoxxxx['pestpadr']==1)
            @canany(['clinicax-leer', 'clinicax-crear', 'clinicax-editar', 'clinicax-borrar'])
            <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxy']=='clinicax') ?' active' : '' }}
        text-sm" href="{{ route('clinicax', $todoxxxx['parametr']) }}">Clínica</a></li>
            @endcanany
            @endif
            @if($todoxxxx['pestpadr']==2)
            @canany(['paciente-leer', 'paciente-crear', 'paciente-editar', 'paciente-borrar'])
            <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxy']=='paciente') ?' active' : '' }} text-sm" href="{{ route('paciente', $todoxxxx['parametr']) }}">Paciente</a></li>
            @endcanany
            @endif
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">

                <div class="card">

                    @include('Clinicas.tabsxxxx.paciente.header')
                </div>

        </div>




    </div>







</div>
