@extends('layouts.index')
@section('content')
<div class="card text-left">
  <div class="card-header">
    <h1 style="text-align: center"><strong>{{ $todoxxxx["tituloxx"] }}</strong> </h1>
  </div>
  <div class="card-body">
    <h5 class="card-title"></h5>
    <form method = "POST" action= "{{route($todoxxxx["routxxxx"].'.crear', $todoxxxx["parametr"])}}">
      @csrf
      @include('layouts.components.botones.botones')  
      @include($todoxxxx["rutacarp"].'formulario.formulario')
      @include('layouts.components.botones.botones')   
    {!!Form::close()!!}
  </div>
</div>
@endsection
  @section('codigo')
  @include($todoxxxx["rutacarp"].'formulario.js')
@endsection