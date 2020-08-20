<div class="card">
    <div class="card-header">
        {{$todoxxxx['cardhead']}}
    </div>
    <div class="card-body">

        <ul class="nav nav-tabs" role="tablist">
            @if($todoxxxx['pestpadr']==1 || $todoxxxx['pestpadr']==2 || $todoxxxx['pestpadr']==3)
            @canany(['clinicax-leer', 'clinicax-crear', 'clinicax-editar', 'clinicax-borrar'])
            <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxy']=='clinicax') ?' active' : '' }}
        text-sm" href="{{ route('clinicax', $todoxxxx['parametr']) }}">Clínica</a></li>
            @endcanany
            @endif


        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <div class="card">
                @include($todoxxxx['tabsxxxx'])
            </div>
        </div>
    </div>
</div>
