
<div class="card text-left">
  <div class="card-header">
    <h1 style="text-align: center"><strong>{{ $todoxxxx["tituloxx"] }}</strong> </h1>
  </div>
  <div class="card-body">
    <h5 class="card-title"></h5>
    {!! Form::open([route($todoxxxx["routxxxx"].'.ver', $todoxxxx["parametr"]), 'method' => 'DELETE']) !!}
      @include('layouts.components.botones.botones')  
      @include($todoxxxx["rutacarp"].$todoxxxx["carpetax"].'.formulario.formulario')
      @include('layouts.components.botones.botones') 
    {!! Form::close() !!}
  </div>
</div>
