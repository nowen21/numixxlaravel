<div class="card card-outline card-secondary">
    <div class="card-header">
        {{$todoxxxx['tituhead']}}
    </div>
    <div class="card-header p-2">
        <ul class="nav nav-tabs">
            @canany(['reportes-modulo'])
            <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='controlpf') ?' active' : '' }}
        text-sm" href="{{ route('controlpf') }}">Controles en procesos</a></li>
            @endcanany
            @canany(['reportes-modulo'])
            <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='orden') ?' active' : '' }}
        text-sm" href="{{ route('orden') }}">Orden de producción</a></li>
            @endcanany
            @canany(['reportes-modulo'])
            <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='alistami') ?' active' : '' }}
        text-sm" href="{{ route('alistami.reporte') }}">Alistamiento de insumos</a></li>
            @endcanany
            @canany(['reportes-modulo'])
            <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='controlt') ?' active' : '' }}
            text-sm" href="{{ route('controlt.reporte') }}">Etiquetas</a></li>
            @endcanany

            @canany(['reportes-modulo'])
            <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='concilia.reporte') ?' active' : '' }}
            text-sm" href="{{ route('concilia.reporte') }}">Conciliación de Materiales</a></li>
            @endcanany

            @canany(['reportes-modulo'])
            <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='dlote.reporte') ?' active' : '' }}
            text-sm" href="{{ route('dlote.reporte') }}">Certificado de Liberación de Lote</a></li>
            @endcanany
            

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
