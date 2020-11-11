<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-clipboard-check"></i>
        <p>
            Reportes
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        @canany(['controlpf-leer'])
            <li class="nav-item">
                <a href="{{ route('controlpf') }}" class="nav-link">
                    <i class="fas fa-child nav-icon"></i>
                    <p>Controles en proceso y productos finalizados</p>
                </a>
            </li>
        @endcanany
        @canany(['ordprodu-leer'])
            <li class="nav-item">
                <a href="{{ route('orden') }}" class="nav-link">
                    <i class="fas fa-child nav-icon"></i>
                    <p>Órdenes de producción</p>
                </a>
            </li>
        @endcanany

        @canany(['produccion-modulo'])
        <li class="nav-item">
            <a href="{{ route('alistami.reporte') }}" class="nav-link">
                <i class="fas fa-child nav-icon"></i>
                <p>Alistamiento</p>
            </a>
        </li>
        @endcanany

        @canany(['produccion-modulo'])
        <li class="nav-item">
            <a href="{{ route('controlp.reporte') }}" class="nav-link">
                <i class="fas fa-child nav-icon"></i>
                <p>Control en Proceso</p>
            </a>
        </li>
        @endcanany

        @canany(['produccion-modulo'])
        <li class="nav-item">
            <a href="{{ route('controlt.reporte') }}" class="nav-link">
                <i class="fas fa-child nav-icon"></i>
                <p>Control de Productos Terminado</p>
            </a>
        </li>
        @endcanany

    </ul>
</li>
