<div class="card">
  <div class="card-header">
    PACIENTE: {{ $todoxxxx['paciente']->nombres }}
  </div>
  <div class="card-header p-2">
    <ul class="nav nav-tabs">
      @canany(['paciente-leer', 'paciente-crear', 'paciente-editar', 'paciente-borrar'])
      <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='paciente') ?' active' : '' }} text-sm" href="{{ route('paciente.editar', $todoxxxx['parametr']) }}">Paciente</a></li>
      @endcanany
      @canany(['formular-leer', 'formular-crear', 'formular-editar', 'formular-borrar'])
      <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='formular') ?' active' : '' }} text-sm" href="{{ route('formular', $todoxxxx['parametr']) }}">Formulaciones</a></li>
      @endcanany
      
    </ul>
  </div>
  <div class="card-body">
    <div class="tab-content">
      <div class="tab-pane active" id="{{ $todoxxxx['slotxxxx'] }}">
        @if(isset($paciente))
          {{ $paciente }}
        @endif
        @if(isset($formular))
          {{ $formular }}
        @endif
      </div>
    </div>
  </div>
</div>