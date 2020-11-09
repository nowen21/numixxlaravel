<div class="card card-outline card-secondary">
    <div class="card-header">
        {{$todoxxxx['tituhead']}}
    </div>
    <div class="card-header p-2">
        <ul class="nav nav-tabs">
            @if($todoxxxx['pestpadr']==1 || $todoxxxx['pestpadr']==2)
            @canany(['controlpf-leer', 'controlpf-crear', 'controlpf-editar', 'controlpf-borrar'])
            <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='controlpf') ?' active' : '' }}
        text-sm" href="{{ route('controlpf') }}">fffasfsdfdsa</a></li>
            @endcanany
            @endif

            @if($todoxxxx['pestpadr']==2)
            

            @endif
        </ul>
    </div>
    <div class="card-body">
        <div class="tab-content">
            <div class="tab-pane active" id="{{ $todoxxxx['slotxxxx'] }}">
                {{ $crudxxxx }}  <!-- nombre que se le data en pestanias de la carpeta Acrud -->
            </div>
        </div>
    </div>
</div>
