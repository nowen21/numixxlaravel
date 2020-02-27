<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
    <i class="nav-icon fas fa-copy"></i>
    <p>
        Indicadores
        <i class="fas fa-angle-left right"></i>
    </p>
    </a>
    <ul class="nav nav-treeview">
        {{-- @can('ingrupal-leer')
            <li class="nav-item">
                <a href="{{ route('gru') }}" class="nav-link">
                <i class="fas fa-check nav-icon"></i>
                <p>Grupales</p>
                </a>
            </li>
        @endcan --}}
        @can('inindividual-leer')
            <li class="nav-item">
                <a href="{{ route('ind') }}" class="nav-link">
                <i class="fas fa-check nav-icon"></i>
                <p>Individuales</p>
                </a>
            </li>
        @endcan
    </ul>
</li>