 <li class="nav-item has-treeview">
    <a href="#" class="nav-link">
    <i class="nav-icon fas fa-chart-pie"></i>
    <p>
        Indicadores
        <i class="fas fa-angle-left right"></i>
    </p>
    </a>
    <ul class="nav nav-treeview">
        @can('inpreguntas-leer')
            <li class="nav-item">
                <a href="{{ route('pr') }}" class="nav-link">
                <i class="fas fa-check nav-icon"></i>
                <p>Peguntas</p>
                </a>
            </li>
        @endcan

        @can('inlineabase-leer')
        <li class="nav-item">
            <a href="{{ route('li') }}" class="nav-link">
            <i class="fas fa-check nav-icon"></i>
            <p>Líneas Base</p>
            </a>
        </li>
    @endcan
    @can('area-leer')
    <li class="nav-item">
        <a href="{{ route('area') }}" class="nav-link">
        <i class="fas fa-sitemap nav-icon"></i>
        <p>Áreas</p>
        </a>
    </li>
    @endcan

    @can('indicador-leer')
        <li class="nav-item">
            <a href="{{ route('in') }}" class="nav-link">
            <i class="fas fa-check nav-icon"></i>
            <p>Indicadores</p>
            </a>
        </li>
    @endcan
      @can('inbasefuente-leer')
        <li class="nav-item">
            <a href="{{ route('lbf') }}" class="nav-link">
            <i class="fas fa-check nav-icon"></i>
            <p>Indicador Línea Base </p>
            </a>
        </li>
    @endcan
    @can('inbasedocumen-leer')
        <li class="nav-item">
            <a href="{{ route('bd') }}" class="nav-link">
            <i class="fas fa-check nav-icon"></i>
            <p>Linea Base Documentos</p>
            </a>
        </li>
    @endcan

    @can('indicador-leer')
        <li class="nav-item">
            <a href="{{ route('inligru') }}" class="nav-link">
            <i class="fas fa-check nav-icon"></i>
            <p>Grupos Línea Base</p>
            </a>
        </li>
    @endcan


    @can('indocindicador-leer')
        <li class="nav-item">
            <a href="{{ route('di.docindicador') }}" class="nav-link">
            <i class="fas fa-check nav-icon"></i>
            <p>Documento Preguntas</p>
            </a>
        </li>
    @endcan
    @can('inrespuesta-leer')
        <li class="nav-item">
            <a href="{{ route('re') }}" class="nav-link">
            <i class="fas fa-question nav-icon"></i>
            <p>Respuestas </p>
            </a>
        </li>
    @endcan




    @can('indiagnostico-leer')
    <li class="nav-item">
        <a href="{{ route('diagnostico') }}" class="nav-link">
        <i class="fas fa-check nav-icon"></i>
        <p>Diagnóstico</p>
        </a>
    </li>
    @endcan




    @can('inacciongestion-leer')
        <li class="nav-item">
            <a href="{{ route('ag') }}" class="nav-link">
            <i class="fas fa-check nav-icon"></i>
            <p>Acción Gestión</p>
            </a>
        </li>
    @endcan



    @can('invaloracion-leer')
        <li class="nav-item">
            <a href="{{ route('inva') }}" class="nav-link">
            <i class="fas fa-check nav-icon"></i>
            <p>Valoración</p>
            </a>
        </li>
    @endcan

    @can('fsoporte-leer')
    <li class="nav-item">
        <a href="{{ route('fsoporte') }}" class="nav-link">
        <i class="fas fa-chess-pawn nav-icon"></i>
        <p>Funtes Soporte</p>
        </a>
    </li>
    @endcan


    {{--
    <li class="nav-item">
        <a href="pages/layout/top-nav.html" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Indicadores</p>
        </a>
    </li>
    --}}

    {{--
    <li class="nav-item">
        <a href="pages/layout/top-nav.html" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Línea Base</p>
        </a>
    </li>
    --}}

    {{--
    <li class="nav-item">
        <a href="pages/layout/top-nav.html" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Balidaciones</p>
        </a>
    </li>
    --}}

    {{--
    <li class="nav-item">
        <a href="pages/layout/top-nav.html" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Respuestas</p>
        </a>
    </li>
    --}}
    </ul>
</li>
