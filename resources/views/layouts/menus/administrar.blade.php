<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-clipboard-check"></i>
        <p>
            Administrar
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        @canany(['usuarios-leer'])
            <li class="nav-item">
                <a href="{{ route('usuario') }}" class="nav-link">
                    <i class="fas fa-child nav-icon"></i>
                    <p>Usuarios</p>
                </a>
            </li>
        @endcanany
        @canany(['roles-leer'])
            <li class="nav-item">
                <a href="{{ route('casa') }}" class="nav-link">
                    <i class="fas fa-child nav-icon"></i>
                    <p>Roles</p>
                </a>
            </li>
        @endcanany

    </ul>
</li>
