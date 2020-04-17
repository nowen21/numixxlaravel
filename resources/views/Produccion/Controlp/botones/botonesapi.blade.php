<?php
$actualxx=date('Y-m-d',time());
$fechregi=explode(' ',$created_at);
?>

@if($actualxx==$fechregi[0])
<a class="btn btn-sm btn-primary" href="{{ route('controlp.editar', $id) }}">Editar</a>
@endif
<a class="btn btn-sm btn-primary" href="{{ route('controlp.ver', $id) }}">Ver</a>