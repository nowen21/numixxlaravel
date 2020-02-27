<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-clipboard-check"></i>
        <p>
            Medicamentos
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        @canany(['casa-leer']) 
            <li class="nav-item">
                <a href="{{ route('casa') }}" class="nav-link">
                    <i class="fas fa-child nav-icon"></i>
                    <p>Casas</p>
                </a>
            </li>
        @endcanany
        @canany(['medicamento-leer']) 
            <li class="nav-item">
                <a href="{{ route('medicamento') }}" class="nav-link">
                    <i class="fas fa-child nav-icon"></i>
                    <p>Medicamentos</p>
                </a>
            </li>
        @endcanany

    </ul>
</li>