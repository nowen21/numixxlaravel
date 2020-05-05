<?php 
$clasexxx='danger';
$textoxxx='Inactivar';
if($queryxxx->sis_esta_id==2){
    $clasexxx='success';
    $textoxxx='Activar';
}
?>
@if($requestx->puededit)
<a class="btn btn-sm btn-{{$clasexxx}} estadoxx" href="javascript:void(0)" id="{{$queryxxx->id}}">{{$textoxxx}}</a>
@endif

