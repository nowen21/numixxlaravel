<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ url('img/Numixx_Nuevo_Logo.png') }}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        @if(isset(Auth::user()->name))
        <p>{{ Auth::user()->name }}</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        @endif
      </div>
    </div>
    <ul class="sidebar-menu">
      <li class="header">MENÚ NAVEGACIÓN</li>
      @can('configuaraciones.configuaracion')
      <li class="treeview">
        <a href="#">
          <i class="fa fa-dashboard"></i> <span>Configuración Datos</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          @can('clinicas.index')
          <li><a href="{{ route('clinicas.index')}}"><i class="fa fa-circle-o"></i>Registrar Clínica</a></li>
          @endcan 
          @can('rangos.index')
          <li><a href="{{ route('rangos.index')}}"><i class="fa fa-circle-o"></i>Rangos</a></li>
          @endcan 
          @can('clinicarangos.index')
          <li><a href="{{ route('clinicarangos.index')}}"><i class="fa fa-circle-o"></i>Clinicas Rangos</a></li>
          @endcan 
          @can('remisiones.index')
          <li><a href="{{ route('remisiones.index')}}"><i class="fa fa-circle-o"></i>Clinica Remisiones</a></li>
          @endcan 
          @can('generos.index')
          <li><a href="{{ route('generos.index')}}"><i class="fa fa-circle-o"></i>Registrar Géneros</a></li>
          @endcan
          @can('eps.index')
          <li><a href="{{ route('eps.index')}}"><i class="fa fa-circle-o"></i>Registrar EPS</a></li>
          @endcan @can('servicios.index')
          <li><a href="{{ route('servicios.index')}}"><i class="fa fa-circle-o"></i>Registrar Servicios</a></li>
          @endcan 
        </ul>
      </li>
      @endcan
      @can('pacientes.paciente')
      <li class="treeview">
        <a href="#">
          <i class="fa fa-dashboard"></i> <span>Pacientes </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          @can('pacientes.index')
          <li><a href="{{ route('pacientes.index')}}"><i class="fa fa-circle-o"></i>Listar Pacientes</a></li>
          @endcan
          @can('pacienteclinicas.index')
          <li><a href="{{ route('pacienteclinicas.index')}}"><i class="fa fa-circle-o"></i>Paciente Clínicas</a></li>
          @endcan
          @can('pacienteservicio.index')
          <li><a href="{{ route('pacienteservicio.index')}}"><i class="fa fa-circle-o"></i>Paciente Servicios</a></li>
          @endcan
        </ul>
      </li>
      @endcan
      @can('npt.index')
      <li class="treeview">
        <a href="#">
          <i class="fa fa-dashboard"></i> <span>Formulación NPT</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          @can('npt.index')
          <li>
            <a href="{{route('npt.index')}}"><i class="fa fa-circle-o"></i>Formulación</a>
          </li>
          @endcan
        </ul>
      </li>
      @endcan

      @can('medicamentos.medicamento')
      <li class="treeview">
        <a href="#">
          <i class="fa fa-dashboard"></i> <span>Medicamentos </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          @can('casas.index')
          <li><a href="{{ route('casas.index')}}"><i class="fa fa-circle-o"></i>Casas</a></li>
          @endcan 
          @can('medicamentos.index')
          <li><a href="{{ route('medicamentos.index')}}"><i class="fa fa-circle-o"></i>Medicamentos</a></li>
          @endcan 
          @can('medicamentonpts.index')
          <li><a href="{{ route('medicamentonpts.index')}}"><i class="fa fa-circle-o"></i>Medicamento Npts</a></li>
          @endcan 
          @can('marcas.index')
          <li><a href="{{ route('marcas.index')}}"><i class="fa fa-circle-o"></i>Marcas</a></li>
          @endcan 
          @can('invimas.index')
          <li><a href="{{ route('invimas.index')}}"><i class="fa fa-circle-o"></i>Registros Invima</a></li>
          @endcan 
          @can('lotes.index')
          <li><a href="{{ route('lotes.index')}}"><i class="fa fa-circle-o"></i>Lotes</a></li>
          @endcan 

        </ul>
      </li>
      @endcan
      @can('dispositivos.dispositivo')
      <li class="treeview">
        <a href="#">
          <i class="fa fa-dashboard"></i> <span>Dispositivos Médicos </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu"> 
          @can('dispositivos.index')
          <li><a href="{{ route('dispositivos.index')}}"><i class="fa fa-circle-o"></i>Dispositivos</a></li>
          @endcan 
          @can('dmarcas.index')
          <li><a href="{{ route('dmarcas.index')}}"><i class="fa fa-circle-o"></i>Marcas</a></li>
          @endcan 

          @can('dinvimas.index')
          <li><a href="{{ route('dinvimas.index')}}"><i class="fa fa-circle-o"></i>Registros Invima</a></li>
          @endcan 
          @can('dlotes.index')
          <li><a href="{{ route('dlotes.index')}}"><i class="fa fa-circle-o"></i>Lotes</a></li>
          @endcan 
        </ul>
      </li>
      @endcan
      @can('producciones.produccion')
      <li class="treeview">
        <a href="#">
          <i class="fa fa-dashboard"></i> <span>Producción </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">  
          @can('dispensaciones.index')
          <li><a href="{{ route('dispensaciones.index')}}"><i class="fa fa-circle-o"></i>Alistamientos</a></li>
          @endcan
          @can('preparaciones.index')
          <li><a href="{{ route('preparaciones.index')}}"><i class="fa fa-circle-o"></i>Preparaciones</a></li>
          @endcan 
          @can('procesos.index')
          <li><a href="{{route('procesos.index')}}"><i class="fa fa-circle-o"></i>Control en Proceso</a></li>
          @endcan       
          @can('terminados.index')
          <li><a href="{{route('terminados.index')}}"><i class="fa fa-circle-o"></i>Control Productos Terminados</a></li>
          @endcan          
          @can('conciliaciones.index')
          <li><a href="{{ route('conciliaciones.index')}}"><i class="fa fa-circle-o"></i>Conciliaciones</a></li>
          @endcan

        </ul>
      </li>
      @endcan
      @can('users.index')
      <li class="treeview">
        <a href="#">
          <i class="fa fa-dashboard"></i> <span>Usuarios</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">          
          @can('users.index')
          <li><a href="{{ route('users.index')}}"><i class="fa fa-circle-o"></i>Administrar</a></li>
          @endcan
        </ul>
      </li>
      @endcan
      @can('roles.index')
      <li class="treeview">
        <a href="#">
          <i class="fa fa-dashboard"></i> <span>Roles</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">          
          @can('roles.index')
          <li><a href="{{ route('roles.index')}}"><i class="fa fa-circle-o"></i>Administrar</a></li>
          @endcan
        </ul>
      </li>
      @endcan
      @can('permisos.index')
      <li class="treeview">
        <a href="#">
          <i class="fa fa-dashboard"></i> <span>Permisos  </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">          
          @can('permisos.index')
          <li><a href="{{ route('permisos.index')}}"><i class="fa fa-circle-o"></i>Administrar</a></li>
          @endcan
        </ul>
      </li>
      @endcan
      @can('reportes.reporte')
      <li class="treeview">
        <a href="#">
          <i class="fa fa-dashboard"></i> <span>Reportes  </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">          
          @can('ordenes.index')
          <li><a href="{{route('controles.index')}}"><i class="fa fa-circle-o"></i>Controles en Proc y Prod Termin</a></li>
          @endcan
          @can('ordenes.index')
          <li><a href="{{route('ordenes.index')}}"><i class="fa fa-circle-o"></i>Órdenes de Producción</a></li>
          @endcan
        </ul>
      </li>
      @endcan

    </ul>
  </section>
  <!-- /.sidebar -->
</aside>