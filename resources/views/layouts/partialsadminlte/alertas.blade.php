@if(isset(Auth::user()->name))
@can('alertas.alertas')
<li class="dropdown tasks-menu">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-bell-o"></i>
    <span class="label label-danger" id="numalert">0</span>
  </a>
  <ul class="dropdown-menu">
    <li class="header" id="cabezaxx">Usted tiene 0 notificaciones</li>
    <li>
      <!-- inner menu: contains the actual data -->
      <ul class="menu" id="alertasx">
        
      </ul>
    </li>
    <li class="footer">
      <a href="#">View all tasks</a>
    </li>
  </ul>
</li>
@endcan
@endif

