
@if($requestx->puededit)
<a class="btn btn-sm btn-primary" href="{{ route('clinica.editar', $queryxxx->id) }}">Editar</a>
@endif
<a class="btn btn-sm btn-primary" href="{{ route('clinica.ver', $queryxxx->id) }}">Ver</a>