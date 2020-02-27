<ul class="nav nav-treeview">
    @canany(['vspaIndex-leer'])
        <li class="nav-item">
            <a href="{{ route('mitigacion')}}" class="nav-link">
                <i class="fas fa-user-shield nav-icon"></i>
                <p>V-SPA</p>
            </a>
        </li>
    @endcanany
</ul>