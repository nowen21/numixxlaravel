 <li class="nav-item has-treeview">
    <a href="#" class="nav-link">
    <i class="nav-icon fas fa-tools"></i>
    <p>
        Pacientes
        <i class="fas fa-angle-left right"></i>
    </p>
    </a>

    <ul class="nav nav-treeview">
        @can('paciente-leer')
        <li class="nav-item">
            <a href="{{ route('paciente') }}" class="nav-link">
                <i class="fas fa-door-open nav-icon"></i>
                <p>Paciente</p>
            </a>
        </li>
        @endcan
    </ul>
</li>
