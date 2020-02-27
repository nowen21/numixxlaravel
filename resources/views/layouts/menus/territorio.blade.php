<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-globe-americas"></i>
        <p>
            Territorio
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            @include('layouts.menus.sicosocial')
        </li>
        @can('fichaIngreso-leer')
            <li class="nav-item">
            <a href="{{ route('fi')}}" class="nav-link">
                <i class="nav-icon fas fa-user-plus"></i>
                <p>Ficha de Ingreso</p>
            </a>
            </li>
        @endcan
    </ul>
</li>