@extends('layouts.index')

@section('content')
	 @component('layouts.components.tablajquery.generalx', ['todoxxxx'=>$todoxxxx])
      @slot('tableName')
      {{ $tableName }}
      @endslot
      @slot('class')
      @endslot 
    @endcomponent 
@endsection

