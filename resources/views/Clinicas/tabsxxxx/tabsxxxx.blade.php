<div class="card">
  <div class="card-header p-2">
    <ul class="nav nav-tabs">
      @canany(['clinica-leer', 'clinica-crear', 'clinica-editar', 'clinica-borrar'])
      <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='clinica') ?' active' : '' }} 
        text-sm" href="{{ route('clinica.editar', $todoxxxx['clinicax']) }}">Clínica</a></li>
      @endcanany
      @canany(['cmedicame-leer', 'cmedicame-crear', 'cmedicame-editar', 'cmedicame-borrar'])
      <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='cmedicame') ?' active' : '' }} 
        text-sm" href="{{ route('cmedicame', $todoxxxx['clinicax']) }}">Medicamento</a></li>
      @endcanany
      @canany(['cpaciente-leer', 'cpaciente-crear', 'cpaciente-editar', 'cpaciente-borrar'])
      <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='cpaciente') ?' active' : '' }} 
        text-sm" href="{{ route('cpaciente', $todoxxxx['clinicax']) }}">Paciente</a></li>
      @endcanany
      @canany(['crango-leer', 'crango-crear', 'crango-editar', 'crango-borrar'])
      <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='crango') ?' active' : '' }} 
        text-sm" href="{{ route('crango', $todoxxxx['clinicax']) }}">Rango</a></li>
      @endcanany
      @canany(['cremision-leer', 'cremision-crear', 'cremision-editar', 'cremision-borrar'])
      <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='cremision') ?' active' : '' }} 
        text-sm" href="{{ route('cremision', $todoxxxx['clinicax']) }}">Remision</a></li>
      @endcanany
      @canany(['cservicio-leer', 'cservicio-crear', 'cservicio-editar', 'cservicio-borrar'])
      <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='cservicio') ?' active' : '' }} 
        text-sm" href="{{ route('cservicio', $todoxxxx['clinicax']) }}">Servicio</a></li>
      @endcanany
    </ul>
  </div>
  <div class="card-body">
    <div class="tab-content">
      <div class="tab-pane active" id="{{ $todoxxxx['slotxxxx'] }}">
      @if(isset($clinica))
      {{ $clinica }}
      @endif
      @if(isset($cmedicame))
      {{ $cmedicame }}
      @endif
      @if(isset($cpaciente))
      {{ $cpaciente }}
      @endif
      @if(isset($crango))
      {{ $crango }}
      @endif
      @if(isset($cremision))
      {{ $cremision }}
      @endif
      @if(isset($cservicio))
      {{ $cservicio }}
      @endif
      </div>
    </div>
  </div>
</div>