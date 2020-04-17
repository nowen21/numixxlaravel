<div class="card">
<div class="card-header">
    {{ $todoxxxx['cardhead']}}
  </div>
  <div class="card-header p-2">
    <ul class="nav nav-tabs">
      @canany(['revision-leer', 'revision-crear', 'revision-editar', 'revision-borrar'])
      <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='revision') ?' active' : '' }} text-sm" 
      href="{{ route('revision', $todoxxxx['parametr']) }}">Revisiones</a></li>
      @endcanany
     
      @canany(['alistami-leer', 'alistami-crear', 'alistami-editar', 'alistami-borrar'])
      <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='alistami') ?' active' : '' }} text-sm" 
      href="{{ route('alistami', $todoxxxx['parametr']) }}">Alistamientos</a></li>
      @endcanany
      @canany(['preparac-leer', 'preparac-crear', 'preparac-editar', 'preparac-borrar'])
      <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='preparac') ?' active' : '' }} text-sm" 
      href="{{ route('preparac', $todoxxxx['parametr']) }}">Preparaciones</a></li>
      @endcanany
      @canany(['controlp-leer', 'controlp-crear', 'controlp-editar', 'controlp-borrar'])
      <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='controlp') ?' active' : '' }} text-sm" 
      href="{{ route('controlp', $todoxxxx['parametr']) }}">Control en proceso</a></li>
      @endcanany
      @canany(['controlt-leer', 'controlt-crear', 'controlt-editar', 'controlt-borrar'])
      <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='controlt') ?' active' : '' }} text-sm" 
      href="{{ route('controlt', $todoxxxx['parametr']) }}">Control Productos Terminados</a></li>
      @endcanany
      @canany(['concilia-leer', 'concilia-crear', 'concilia-editar', 'concilia-borrar'])
      <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='concilia') ?' active' : '' }} text-sm" 
      href="{{ route('concilia', $todoxxxx['parametr']) }}">Conciliaciones</a></li>
      @endcanany
    </ul>
  </div>
  <div class="card-body">
    <div class="tab-content">
      <div class="tab-pane active" id="{{ $todoxxxx['slotxxxx'] }}">
        @if(isset($revision))
          {{ $revision }}
        @endif
        @if(isset($alistami))
          {{ $alistami }}
        @endif
        @if(isset($preparac))
          {{ $preparac }}
        @endif
        @if(isset($controlp))
          {{ $controlp }}
        @endif
        @if(isset($controlt))
          {{ $controlt }}
        @endif
        @if(isset($concilia))
          {{ $concilia }}
        @endif
      </div>
    </div>
  </div>
</div>