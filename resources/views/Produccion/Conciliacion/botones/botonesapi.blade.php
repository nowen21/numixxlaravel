<?php
$actualxx=date('Y-m-d',time());
$fechregi=explode(' ',$created_at);
?>


<a class="btn btn-sm btn-primary" href="{{ route('concilia.editar', $id) }}">Editar</a>




<a class="btn btn-sm btn-primary" href="{{ route('concilia.ver', $id) }}">Ver</a>