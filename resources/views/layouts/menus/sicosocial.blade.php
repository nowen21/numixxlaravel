<li class="nav-item has-treeview">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-street-view"></i>
    <p>
      Sicosocial
      <i class="fas fa-angle-left right"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
      @can('vsidatobasico-leer')
    <li class="nav-item">
      <a href="{{ route('vsi')}}" class="nav-link">
        <i class="fas fa-map-marker-alt nav-icon"></i>
        <p>Valoración Sicosocial</p>
      </a>
    </li>
    @endcan
    @can('csddatobasico-leer')
    <li class="nav-item">
      <a href="{{ route('csd')}}" class="nav-link">
        <i class="fas fa-home nav-icon"></i>
        <p>Consulta Social en Domicilio</p>
      </a>
    </li>
    @endcan
    @can('isintervencion-leer')
    <li class="nav-item">
      <a href="{{ route('is')}}" class="nav-link">
        <i class="fas fa-home nav-icon"></i>
        <p>Intervención Sicosocial</p>
      </a>
    </li>
    @endcan
    @can('fosfichaobservacion-leer')
	<li class="nav-item">
      <a href="{{ route('fos')}}" class="nav-link">
        <i class="fas fa-home nav-icon"></i>
        <p>Ficha de Observación</p>
      </a>
    </li>
    @endcan
  </ul>
</li>