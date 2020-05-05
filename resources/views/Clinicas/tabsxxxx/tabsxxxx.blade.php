<div class="card">
  <div class="card-header">
    {{$todoxxxx['cardhead']}}
  </div>
  <div class="card-body">
  <?php
      $puedexxx=auth()->user()->can('clinica-editar')?'editar':'ver';
      ?>
    <ul class="nav nav-tabs" role="tablist">
      <li class="nav-item">
        @canany(['clinica-leer', 'clinica-crear', 'clinica-editar', 'clinica-borrar'])
      <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxy']=='clinica') ?' active' : '' }} 
        text-sm" href="{{ route('clinica.'.$puedexxx, $todoxxxx['parametr']) }}">Clínica</a></li>
      @endcanany
      </li>
      
      <li class="nav-item">
        @canany(['paciente-leer', 'paciente-crear', 'paciente-editar', 'paciente-borrar'])
      <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxy']=='paciente') ?' active' : '' }} text-sm" href="{{ route('paciente', $todoxxxx['parametr']) }}">Paciente</a></li>
      @endcanany
      </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
      <div id="home" class="container tab-pane active">
        <div class="card">
          @if(isset($paciente) || isset($formular))
            @include('Clinicas.tabsxxxx.paciente.header')
            @include('Clinicas.tabsxxxx.paciente.body')
          @else
            @include('Clinicas.tabsxxxx.clinica.header')
            @include('Clinicas.tabsxxxx.clinica.body')
          @endif
        </div>
      </div>
    </div>




  </div>







</div>