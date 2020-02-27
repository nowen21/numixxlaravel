@extends('layouts.index')

@section('content')
  @foreach ($todoxxxx['tablasxx'] as $tablasxx)
    @component('layouts.components.tablajquery.generalx', ['todoxxxx'=>$tablasxx])
      @slot('tableName')
      {{$tablasxx['tablaxxx'] }}
      @endslot
      @slot('class')
      @endslot 
    @endcomponent
  @endforeach 
@endsection

@section('codigo')

            @include('layouts.components.tablajquery.js')
            @include($todoxxxx["rutacarp"].'.js.tabla')
@endsection

