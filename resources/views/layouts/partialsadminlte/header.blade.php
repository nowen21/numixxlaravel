<header class="main-header">
  <!-- Logo -->
  <a href="{{ url('/') }}" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>A</b>LT</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>NUMIXX</b>S.A.S</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        @include('layouts.partialsadminlte.alertas')
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="{{ url('img/Numixx_Nuevo_Logo.png') }}" class="user-image" alt="User Image">
            <span class="hidden-xs">
              @if(isset(Auth::user()->name))
              {{ Auth::user()->name }}
              @else
              fuera de línea
              @endif
            </span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="{{ url('img/Numixx_Nuevo_Logo.png') }}" class="img-circle" alt="User Image">

              <p>
                @if(isset(Auth::user()->name))
                {{ Auth::user()->name }}
                @else
                fuera de línea
                @endif

              </p>
            </li>
            <!-- Menu Body -->

            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-right">
                @guest
                <a class="btn btn-default btn-flat" href="{{ route('login') }}">Login</a>
                <!--<a class="btn btn-default btn-flat" href="{{ route('register') }}">Register</a>-->
                @else
                <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                  {{ csrf_field() }}
                  <button class="btn btn-default btn-flat">Sign out</button>
                </form>
                @endguest
              </div>
            </li>
          </ul>
        </li>
      </ul>

    </div>
  </nav>
</header>