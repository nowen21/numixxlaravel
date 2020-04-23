<?php
$actualxx=date('Y-m-d',time());
$fechregi=explode(' ',$created_at);
?>

@if($actualxx==$fechregi[0])
<a class="btn btn-sm btn-primary" href="{{ route('alistami.editar', $id) }}">Editar</a>
@endif

<a class="btn btn-sm btn-primary" href="{{ route('alistami.imprimir', $id) }}">Imprimir</a>

<a class="btn btn-sm btn-primary" href="{{ route('alistami.ver', $id) }}">Ver</a>