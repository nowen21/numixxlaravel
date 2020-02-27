<div class="card">
  <div class="card-header p-2">
    <ul class="nav nav-tabs">
      @canany(['rango-leer', 'rango-crear', 'rango-editar', 'rango-borrar'])
      <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='rango') ?' active' : '' }} text-sm" href="{{ route('rango', $todoxxxx['padrexxx']) }}">Rango</a></li>
      @endcanany
    </ul>
  </div>
  <div class="card-body">
    <div class="tab-content">
      <div class="tab-pane active" id="{{ $todoxxxx['slotxxxx'] }}">
        @if(isset($rango))
        {{ $rango }}
        @endif
      </div>
    </div>
  </div>
</div>