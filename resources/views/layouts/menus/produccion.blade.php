<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-clipboard-check"></i>
        <p>
            Producción
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        @canany(['alistami-leer'])
            <li class="nav-item">
                <a href="{{ route('casa') }}" class="nav-link">
                    <i class="fas fa-child nav-icon"></i>
                    <p>Alistamientos</p>
                </a>
            </li>
        @endcanany
        @canany(['preparac-leer'])
            <li class="nav-item">
                <a href="{{ route('medicamento') }}" class="nav-link">
                    <i class="fas fa-child nav-icon"></i>
                    <p>Preparaciones</p>
                </a>
            </li>
        @endcanany
        @canany(['controlp-leer'])
            <li class="nav-item">
                <a href="{{ route('medicamento') }}" class="nav-link">
                    <i class="fas fa-child nav-icon"></i>
                    <p>Control en proceso</p>
                </a>
            </li>
        @endcanany
        @canany(['controlt-leer'])
            <li class="nav-item">
                <a href="{{ route('medicamento') }}" class="nav-link">
                    <i class="fas fa-child nav-icon"></i>
                    <p>Control productos terminados</p>
                </a>
            </li>
        @endcanany
        @canany(['concilia-leer'])
            <li class="nav-item">
                <a href="{{ route('medicamento') }}" class="nav-link">
                    <i class="fas fa-child nav-icon"></i>
                    <p>Conciliaciones</p>
                </a>
            </li>
        @endcanany

    </ul>
</li>
